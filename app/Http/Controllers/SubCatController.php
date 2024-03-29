<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcat;
use App\Models\product;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $objs = subcat::paginate(30);
        if(isset($objs)){
            foreach($objs as $u){
                $count = product::where('sub_cat_id', $u->id)->count();
                $u->option = $count;
            }
        }
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.subcat.index', compact('objs'));
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

    public function create_new()
    {
        //
        $cat = category::all();
        $data['cat'] = $cat;
        $data['method'] = "post";
        $data['url'] = url('admin/subcat');
        return view('admin.subcat.create_new', $data);
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
            'sub_name_en' => 'required',
            'cat_id' => 'required',
            'image' => 'required'
           ]);
           
           $image = $request->file('image');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('wpnrayong/subcat/'.$image->hashName(), $img, 'public');


        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new subcat();
           $objs->sub_name = $request['sub_name'];
           $objs->sub_name_en = $request['sub_name_en'];
           $objs->cat_id = $request['cat_id'];
           $objs->image = $image->hashName();
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
            'sub_name_en' => 'required',
            'cat_id' => 'required',
           ]);
           
           $image = $request->file('image');


           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

       


           if($image == NULL){

           $objs = subcat::find($id);
           $objs->sub_name = $request['sub_name'];
           $objs->sub_name_en = $request['sub_name_en'];
           $objs->cat_id = $request['cat_id'];
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('subcats')
          ->where('id', $id)
          ->first();

          $storage = Storage::disk('do_spaces');
          $storage->delete('wpnrayong/subcat/' . $img->image, 'public');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(400, 400, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('wpnrayong/subcat/'.$image->hashName(), $img, 'public');

            
     
           $objs = subcat::find($id);
           $objs->sub_name = $request['sub_name'];
           $objs->sub_name_en = $request['sub_name_en'];
           $objs->cat_id = $request['cat_id'];
           $objs->image = $image->hashName();
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

            if($objs->sub_name == 'ไม่มีหมวดหมู่'){

                return redirect(url('admin/subcat/'))->with('edit_error','คุณทำการเพิ่มอสังหา สำเร็จ');

            }else{

                $new = DB::table('subcats')
                ->where('sub_name', 'ไม่มีหมวดหมู่')
                ->first();

                product::where('sub_cat_id', $id)
                ->update(['sub_cat_id' => $new->id]);

                $idcat = $objs->cat_id;

            if(isset($objs->image)){
                $storage = Storage::disk('do_spaces');
                $storage->delete('wpnrayong/subcat/' . $objs->image, 'public');
            }

        $obj = subcat::find($id);
        $obj->delete();

        return redirect(url('admin/category/'.$idcat.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

            }

           
    }
}
