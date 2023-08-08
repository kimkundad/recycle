<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\unit_product;
use App\Models\category;
use App\Models\subcat;
use App\Models\brand;
use App\Models\product_image;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = DB::table('products')->count();
        $objs = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.status as status1',
            'subcats.*',
            'unit_products.*'
            )
            ->leftjoin('subcats', 'subcats.id',  'products.sub_cat_id')
            ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')
            ->orderBy('products.mysort', 'asc')
            ->orderBy('products.status', 'desc')
            ->paginate(15);

            $objs->setPath('');
        $data['objs'] = $objs;

        
        return view('admin.product.index', compact('objs', 'count'));
    }

    public function recommend(){

        $objs = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.status as status1',
            'subcats.*'
            )
            ->leftjoin('subcats', 'subcats.id',  'products.sub_cat_id')
            ->where('products.type_pro', 2)
            ->orderBy('products.sort', 'asc')
            ->orderBy('products.status', 'desc')
            ->paginate(15);

            $objs->setPath('');
        $data['objs'] = $objs;

        
        return view('admin.product.recommend', compact('objs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = subcat::where('status', 1)->get();
        $brand = brand::where('status', 1)->get();
        $unit_product = unit_product::where('unit_status', 1)->get();
        
        $data['unit_product'] = $unit_product;
        $data['cat'] = $cat;
        $data['brand'] = $brand;
        $data['method'] = "post";
        $data['url'] = url('admin/product');
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $this->validate($request, [
            'name_pro' => 'required',
            'image_pro' => 'required',
            'sub_cat_id' => 'required',
            'brand' => 'required',
            'sku' => 'required',
            'amount' => 'required',
            'sum' => 'required'
        ]);

        $image = $request->file('image_pro');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('wpnrayong/product/'.$image->hashName(), $img, 'public');

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }


        $sub = subcat::find($request['sub_cat_id']);

        if($sub){
            $mysub = $request['sub_cat_id'];
            $cat_id = $sub->cat_id;
        }else{

            $new = DB::table('subcats')
                ->where('sub_name', 'ไม่มีหมวดหมู่')
                ->first();

            $mysub = $new->id;
            $cat_id = $new->cat_id;
        }

           $objs = new product();
           $objs->name_pro = $request['name_pro'];
           $objs->image_pro = $image->hashName();
           $objs->sub_cat_id = $mysub;
           $objs->cat_id = $cat_id;
           $objs->brand = $request['brand'];
           $objs->sku = $request['sku'];
           $objs->amount = $request['amount'];
           $objs->sum = $request['sum'];
           $objs->condition = $request['condition'];
           $objs->sort = $request['sort'];
           $objs->discount = $request['discount'];
           $objs->title_pro = $request['title_pro'];
           $objs->detail_pro = $request['kt_docs_ckeditor_classic'];
           $objs->type_pro = $request['type_pro'];
           $objs->weight = $request['weight'];
           $objs->unit_id = $request['unit_id'];
           $objs->status = $status;
           $objs->mysort = $request['mysort'];
           $objs->save();

           return redirect(url('admin/product'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function api_post_status_product(Request $request){

        $user = product::findOrFail($request->user_id);

              if($user->status == 1){
                  $user->status = 0;
              } else {
                  $user->status = 1;
              }


      return response()->json([
      'data' => [
        'success' => $user->save(),
      ]
    ]);

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $unit_product = unit_product::where('unit_status', 1)->get();
        $data['unit_product'] = $unit_product;

        $img = product_image::where('product_id', $id)->get();
        $data['img'] = $img;
        $cat = subcat::where('status', 1)->get();
        $data['cat'] = $cat;

        $brand = brand::where('status', 1)->get();
        $data['brand'] = $brand;

        $objs = product::find($id);
        $data['url'] = url('admin/product/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['pro_id'] = $id;
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function upload_img_product(Request $request, $id){
       
        $gallary = $request->file('file');

        $this->validate($request, [
             'file' => 'required|max:8048'
         ]);


         $input['imagename'] = time().'.'.$gallary->getClientOriginalExtension();
           $img = Image::make($gallary->getRealPath());
           $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
           });
           $img->stream();
           Storage::disk('do_spaces')->put('wpnrayong/product_images/'.$gallary->hashName(), $img, 'public');

            $admins[] = [
                'image' => $gallary->hashName(),
                'product_id' => $id
            ];
          
          product_image::insert($admins);
        
          return Response::json(array('success' => true, 'message' => 'Successfully uploaded file.'), 200);


    }

    public function image_del($id){

        $objs = DB::table('product_images')
            ->where('id', $id)
            ->first();

          $pid = $objs->product_id;

            if(isset($objs->image)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('wpnrayong/product_images/' . $objs->image, 'public');
            }

        $obj = product_image::find($id);
        $obj->delete();

        return redirect(url('admin/product/'.$pid.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    public function update(Request $request, $id)
    {
        //
       // dd($request->all());
        $this->validate($request, [
            'name_pro' => 'required',
            'sub_cat_id' => 'required',
            'brand' => 'required',
            'sku' => 'required',
            'amount' => 'required',
            'sum' => 'required'
        ]);

        $sub = subcat::find($request['sub_cat_id']);

        if($sub){
            $mysub = $request['sub_cat_id'];
            $cat_id = $sub->cat_id;
        }else{

            $new = DB::table('subcats')
                ->where('sub_name', 'ไม่มีหมวดหมู่')
                ->first();

            $mysub = $new->id;
            $cat_id = $new->cat_id;
        }

        $image = $request->file('image_pro');

        $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($image == NULL){

           $objs = product::find($id);
           $objs->name_pro = $request['name_pro'];
           $objs->sub_cat_id = $mysub;
           $objs->cat_id = $cat_id;
           $objs->brand = $request['brand'];
           $objs->sku = $request['sku'];
           $objs->amount = $request['amount'];
           $objs->sum = $request['sum'];
           $objs->condition = $request['condition'];
           $objs->discount = $request['discount'];
           $objs->title_pro = $request['title_pro'];
           $objs->detail_pro = $request['kt_docs_ckeditor_classic'];
           $objs->type_pro = $request['type_pro'];
           $objs->weight = $request['weight'];
           $objs->status = $status;
           $objs->unit_id = $request['unit_id'];
           $objs->sort = $request['sort'];
           $objs->mysort = $request['mysort'];
           $objs->save();

   

            }else{

         $img = DB::table('products')
          ->where('id', $id)
          ->first();

          $storage = Storage::disk('do_spaces');
          $storage->delete('wpnrayong/product/' . $img->image_pro, 'public');

        

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('wpnrayong/product/'.$image->hashName(), $img, 'public');

            $objs = product::find($id);
           $objs->name_pro = $request['name_pro'];
           $objs->image_pro = $image->hashName();
           $objs->sub_cat_id = $mysub;
           $objs->cat_id = $cat_id;
           $objs->brand = $request['brand'];
           $objs->sku = $request['sku'];
           $objs->amount = $request['amount'];
           $objs->sum = $request['sum'];
           $objs->condition = $request['condition'];
           $objs->discount = $request['discount'];
           $objs->title_pro = $request['title_pro'];
           $objs->detail_pro = $request['kt_docs_ckeditor_classic'];
           $objs->type_pro = $request['type_pro'];
           $objs->weight = $request['weight'];
           $objs->status = $status;
           $objs->unit_id = $request['unit_id'];
           $objs->sort = $request['sort'];
           $objs->mysort = $request['mysort'];
           $objs->save();

            }    


            return redirect(url('admin/product/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_pro($id)
    {
        //
        $objs = DB::table('products')
            ->where('id', $id)
            ->first();

            if(isset($objs->image_pro)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('wpnrayong/product/' . $objs->image_pro, 'public');
            }

        $obj = product::find($id);
        $obj->delete();

        return redirect(url('admin/product/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
