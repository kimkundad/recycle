<?php

namespace App\Http\Controllers;

use App\Models\DesignMaterial;
use App\Models\DesignSize;
use App\Models\DesignType;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesignProductFilterController extends Controller
{
    private function getGroups()
    {
        return [
            'type' => [
                'model' => DesignType::class,
                'title' => 'ประเภทสินค้า',
                'title_en' => 'Product Type',
            ],
            'material' => [
                'model' => DesignMaterial::class,
                'title' => 'วัสดุ',
                'title_en' => 'Material',
            ],
            'size' => [
                'model' => DesignSize::class,
                'title' => 'ขนาด',
                'title_en' => 'Size',
            ],
        ];
    }

    private function resolveGroup(string $group)
    {
        $groups = $this->getGroups();
        abort_unless(isset($groups[$group]), 404);
        return $groups[$group];
    }

    public function index()
    {
        $groups = $this->getGroups();
        $data['groupItems'] = [];

        foreach ($groups as $key => $config) {
            $modelClass = $config['model'];
            $data['groupItems'][$key] = [
                'title' => $config['title'],
                'title_en' => $config['title_en'],
                'items' => $modelClass::withCount('products')->orderBy('sort', 'asc')->orderBy('id', 'desc')->get(),
            ];
        }

        $siteSetting = setting::find(1);
        $data['showFilterTypes'] = $siteSetting ? (bool) $siteSetting->show_filter_types : true;
        $data['showFilterMaterials'] = $siteSetting ? (bool) $siteSetting->show_filter_materials : true;
        $data['showFilterSizes'] = $siteSetting ? (bool) $siteSetting->show_filter_sizes : true;

        return view('admin.design_product_filters.index', $data);
    }

    public function apiUpdateVisibility(Request $request)
    {
        $allowed = ['show_filter_types', 'show_filter_materials', 'show_filter_sizes'];
        $field = $request->input('field');

        if (!in_array($field, $allowed)) {
            return response()->json(['success' => false], 422);
        }

        $objs = setting::find(1);
        if ($objs) {
            $objs->$field = (int) $request->input('value', 0);
            $objs->save();
        }

        return response()->json(['success' => true]);
    }

    public function create(Request $request)
    {
        $groupKey = $request->query('group', 'type');
        $group = $this->resolveGroup($groupKey);

        $data['groupKey'] = $groupKey;
        $data['groupTitle'] = $group['title'];
        $data['method'] = 'post';
        $data['url'] = url('admin/design-product-filters');

        return view('admin.design_product_filters.create', $data);
    }

    public function store(Request $request)
    {
        $groupKey = $request->input('group');
        $group = $this->resolveGroup($groupKey);
        $modelClass = $group['model'];

        $this->validate($request, [
            'group' => 'required',
            'name_th' => 'required',
        ]);

        $status = $request->has('status') ? 1 : 0;
        $slugSource = $request->input('name_en') ?: $request->input('name_th');
        $slug = Str::slug($slugSource);

        if (empty($slug)) {
            $slug = $groupKey . '-' . Str::random(8);
        }

        $modelClass::create([
            'name_th' => $request->input('name_th'),
            'name_en' => $request->input('name_en'),
            'slug' => $slug,
            'sort' => $request->input('sort', 0),
            'status' => $status,
        ]);

        return redirect(url('admin/design-product-filters'))->with('add_success', 'เพิ่มข้อมูลสำเร็จแล้ว');
    }

    public function edit($group, $id)
    {
        $groupConfig = $this->resolveGroup($group);
        $modelClass = $groupConfig['model'];

        $data['groupKey'] = $group;
        $data['groupTitle'] = $groupConfig['title'];
        $data['method'] = 'put';
        $data['url'] = url('admin/design-product-filters/' . $group . '/' . $id);
        $data['objs'] = $modelClass::findOrFail($id);

        return view('admin.design_product_filters.edit', $data);
    }

    public function update(Request $request, $group, $id)
    {
        $groupConfig = $this->resolveGroup($group);
        $modelClass = $groupConfig['model'];

        $this->validate($request, [
            'name_th' => 'required',
        ]);

        $objs = $modelClass::findOrFail($id);
        $status = $request->has('status') ? 1 : 0;
        $slugSource = $request->input('name_en') ?: $request->input('name_th');
        $slug = Str::slug($slugSource);

        if (empty($slug)) {
            $slug = $group . '-' . $id;
        }

        $objs->name_th = $request->input('name_th');
        $objs->name_en = $request->input('name_en');
        $objs->slug = $slug;
        $objs->sort = $request->input('sort', 0);
        $objs->status = $status;
        $objs->save();

        return redirect(url('admin/design-product-filters/' . $group . '/' . $id . '/edit'))->with('edit_success', 'บันทึกข้อมูลสำเร็จแล้ว');
    }

    public function api_post_status(Request $request)
    {
        $group = $this->resolveGroup($request->input('group'));
        $modelClass = $group['model'];

        $item = $modelClass::findOrFail($request->input('item_id'));
        $item->status = $item->status == 1 ? 0 : 1;

        return response()->json([
            'data' => [
                'success' => $item->save(),
            ],
        ]);
    }

    public function destroy($group, $id)
    {
        $groupConfig = $this->resolveGroup($group);
        $modelClass = $groupConfig['model'];

        $item = $modelClass::findOrFail($id);
        $item->delete();

        return redirect(url('admin/design-product-filters'))->with('del_success', 'ลบข้อมูลสำเร็จแล้ว');
    }
}
