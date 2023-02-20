<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcat;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $cat = category::find($id);
        $data['cat_name'] = $cat->cat_name;
        $data['cat_id'] = $id;
        $data['method'] = "post";
        $data['url'] = url('admin/subcat');
        return view('admin.subcat.create', $data);
    }


    public function api_post_status_subcat(Request $request){

        $user = subcat::findOrFail($request->user_id);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
   
           $this->validate($request, [
            'sub_name' => 'required',
            'cat_id' => 'required',
            'image' => 'required',
            'icons' => 'required'
           ]);
           
           $image = $request->file('image');
           $icons = $request->file('icons');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            })->save('img/category/'.$input['imagename']);


            $path = 'img/category/';
            $filename = time()."-".$icons->getClientOriginalName();
            $icons->move($path, $filename);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new subcat();
           $objs->sub_name = $request['sub_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->image = $input['imagename'];
           $objs->icons = $filename;
           $objs->status = $status;
           $objs->save();


           return redirect(url('admin/category/'.$request['cat_id'].'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        
        $objs = subcat::find($id);
        $cat = category::where('id', $objs->cat_id)->first();
        $data['cat'] = $cat;
        $data['url'] = url('admin/post_subcat/'.$id);
        $data['method'] = "post";
        $data['objs'] = $objs;
        return view('admin.subcat.edit', $data);
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

           $this->validate($request, [
            'sub_name' => 'required',
            'cat_id' => 'required',
           ]);
           
           $image = $request->file('image');
           $icons = $request->file('icons');


           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($icons !== NULL){

                $img = DB::table('subcats')
                ->where('id', $id)
                ->first();
              //  dd($img->icons);
          if($img->icons !== null && $img->icons !== ""){
            $file_path = 'img/category/'.$img->icons;
            unlink($file_path);
          }
         

            $path = 'img/category/';
            $filename = time()."-".$icons->getClientOriginalName();
            $icons->move($path, $filename);

            $objs = subcat::find($id);
            $objs->icons = $filename;
            $objs->save();

            }


           if($image == NULL){

           $objs = subcat::find($id);
           $objs->sub_name = $request['sub_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('subcats')
          ->where('id', $id)
          ->first();

          $file_path = 'img/category/'.$img->image;
          unlink($file_path);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
            })->save('img/category/'.$input['imagename']);

            
     
           $objs = subcat::find($id);
           $objs->sub_name = $request['sub_name'];
           $objs->cat_id = $request['cat_id'];
           $objs->image = $input['imagename'];
           $objs->status = $status;
           $objs->save();

           }

           
           return redirect(url('admin/category/'.$request['cat_id'].'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_subcat($id)
    {
        //
        $objs = DB::table('subcats')
            ->where('id', $id)
            ->first();

           $idcat = $objs->cat_id;

            if(isset($objs->image)){
              $file_path = 'img/category/'.$objs->image;
               unlink($file_path);
            }

        $obj = subcat::find($id);
        $obj->delete();

        return redirect(url('admin/category/'.$idcat.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
}
