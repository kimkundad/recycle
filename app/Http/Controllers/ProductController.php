<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\subcat;
use App\Models\brand;
use App\Models\product_image;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Response;

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
        $objs = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.status as status1',
            'categories.*'
            )
            ->leftjoin('categories', 'categories.id',  'products.cat_id')
            ->paginate(15);

            $objs->setPath('');
        $data['objs'] = $objs;

        
        return view('admin.product.index', compact('objs'));
    }

    public function recommend(){

        $objs = DB::table('products')->select(
            'products.*',
            'products.id as id_q',
            'products.status as status1',
            'categories.*'
            )
            ->leftjoin('categories', 'categories.id',  'products.cat_id')
            ->where('products.type_pro', 2)
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
        })->save('img/product/'.$input['imagename']);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

        $sub = subcat::find($request['sub_cat_id']);

           $objs = new product();
           $objs->name_pro = $request['name_pro'];
           $objs->image_pro = $input['imagename'];
           $objs->sub_cat_id = $request['sub_cat_id'];
           $objs->cat_id = $sub->cat_id;
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

            $path = 'img/cusimage/';
            $filename = time()."-".$gallary->getClientOriginalName();
            $gallary->move($path, $filename);
            $admins[] = [
                'image' => $filename,
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
              $file_path = 'img/cusimage/'.$objs->image;
               unlink($file_path);
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
           $objs->sub_cat_id = $request['sub_cat_id'];
           $objs->cat_id = $sub->cat_id;
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
           $objs->save();

           dd($objs);

            }else{

         $img = DB::table('products')
          ->where('id', $id)
          ->first();

          $file_path = 'img/product/'.$img->image_pro;
          unlink($file_path);

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        })->save('img/product/'.$input['imagename']);

            $objs = product::find($id);
           $objs->name_pro = $request['name_pro'];
           $objs->image_pro = $input['imagename'];
           $objs->sub_cat_id = $request['sub_cat_id'];
           $objs->cat_id = $sub->cat_id;
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
              $file_path = 'img/product/'.$objs->image_pro;
               unlink($file_path);
            }

        $obj = product::find($id);
        $obj->delete();

        return redirect(url('admin/product/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
