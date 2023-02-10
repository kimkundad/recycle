<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = category::where('status', 1)->get();

        $data['cat'] = $cat;
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
            'cat_id' => 'required',
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

           $objs = new product();
           $objs->name_pro = $request['name_pro'];
           $objs->image_pro = $input['imagename'];
           $objs->cat_id = $request['cat_id'];
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

        $cat = category::where('status', 1)->get();
        $data['cat'] = $cat;

        $objs = product::find($id);
        $data['url'] = url('admin/product/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       // dd($request->all());
        $this->validate($request, [
            'name_pro' => 'required',
            'cat_id' => 'required',
            'brand' => 'required',
            'sku' => 'required',
            'amount' => 'required',
            'sum' => 'required'
        ]);

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
           $objs->cat_id = $request['cat_id'];
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
           $objs->cat_id = $request['cat_id'];
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
