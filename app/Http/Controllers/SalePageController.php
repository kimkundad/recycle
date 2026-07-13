<?php

namespace App\Http\Controllers;

use App\Models\SalePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SalePageController extends Controller
{
    public function index()
    {
        $objs = SalePage::withCount('views')->orderBy('id', 'desc')->paginate(30);
        return view('admin.sale-pages.index', compact('objs'));
    }

    public function create()
    {
        return view('admin.sale-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:sale_pages,slug|regex:/^[a-z0-9\-]+$/',
        ]);

        $data = $request->only([
            'title', 'slug', 'body',
            'phone', 'phone_label', 'line_url', 'inquiry_url', 'inquiry_label',
            'head_scripts', 'body_scripts',
        ]);

        $data['contacts'] = array_values(array_filter(
            $request->input('contacts', []),
            fn($c) => !empty($c['name']) || !empty($c['phone'])
        ));
        $data['status'] = $request->has('status') ? 1 : 0;

        SalePage::create($data);

        return redirect(url('admin/sale-pages'))->with('success', 'สร้าง Sale Page เรียบร้อย');
    }

    public function edit(int $id)
    {
        $objs = SalePage::withCount('views')->findOrFail($id);
        return view('admin.sale-pages.edit', compact('objs'));
    }

    public function update(Request $request, int $id)
    {
        $objs = SalePage::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:sale_pages,slug,' . $id . '|regex:/^[a-z0-9\-]+$/',
        ]);

        $data = $request->only([
            'title', 'slug', 'body',
            'phone', 'phone_label', 'line_url', 'inquiry_url', 'inquiry_label',
            'head_scripts', 'body_scripts',
        ]);

        $data['contacts'] = array_values(array_filter(
            $request->input('contacts', []),
            fn($c) => !empty($c['name']) || !empty($c['phone'])
        ));
        $data['status'] = $request->has('status') ? 1 : 0;

        $objs->update($data);

        return redirect(url('admin/sale-pages/' . $id . '/edit'))->with('success', 'บันทึกเรียบร้อย');
    }

    public function destroy(int $id)
    {
        SalePage::findOrFail($id)->delete();
        return redirect(url('admin/sale-pages'))->with('success', 'ลบเรียบร้อย');
    }

    public function fileManager()
    {
        $bucket   = config('filesystems.disks.do_spaces.bucket');
        $endpoint = rtrim(config('filesystems.disks.do_spaces.endpoint'), '/');

        $files  = Storage::disk('do_spaces')->files('wpnrayong/sale-page');
        $images = array_map(fn($f) => [
            'path' => $f,
            'url'  => $endpoint . '/' . $bucket . '/' . $f,
        ], $files);

        return view('admin.sale-pages.file-manager', compact('images'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['upload' => 'required|image|max:5120']);

        $file     = $request->file('upload');
        $filename = 'wpnrayong/sale-page/' . time() . '-' . $file->hashName();

        Storage::disk('do_spaces')->put($filename, file_get_contents($file), 'public');

        $url = rtrim(config('filesystems.disks.do_spaces.endpoint'), '/')
             . '/' . config('filesystems.disks.do_spaces.bucket')
             . '/' . $filename;

        return response()->json(['url' => $url, 'path' => $filename]);
    }

    public function inquiries(Request $request)
    {
        $query = \App\Models\SalePageInquiry::with('salePage')->orderBy('id', 'desc');

        if ($request->filled('sale_page_id')) {
            $query->where('sale_page_id', $request->sale_page_id);
        }

        $objs      = $query->paginate(30)->withQueryString();
        $salePages = SalePage::orderBy('title')->get(['id', 'title']);

        return view('admin.sale-pages.inquiries', compact('objs', 'salePages'));
    }

    public function destroyInquiry(int $id)
    {
        \App\Models\SalePageInquiry::findOrFail($id)->delete();
        return response()->json(['ok' => true]);
    }

    public function deleteImage(Request $request)
    {
        $request->validate(['path' => 'required|string']);
        $path = $request->input('path');

        if (!str_starts_with($path, 'wpnrayong/sale-page/')) {
            abort(403);
        }

        Storage::disk('do_spaces')->delete($path);

        return response()->json(['ok' => true]);
    }
}
