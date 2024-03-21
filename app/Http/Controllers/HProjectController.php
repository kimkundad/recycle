<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hproject;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class HProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //hproject

        $objs = hproject::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.hproject.index', compact('objs'));

    }



    public function api_post_status_hproject(Request $request){

        $user = hproject::findOrFail($request->user_id);

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/hproject');
        return view('admin.hproject.create', $data);
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
            'header' => 'required',
            'content' => 'required',
            'content_en' => 'required',
            'image' => 'required'
           ]);

           $image = $request->file('image');

           $path = 'img/hproject/';
            $filename = time()."-".$image->getClientOriginalName();
            $image->move($path, $filename);

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

           $objs = new hproject();
           $objs->header = $request['header'];
           $objs->content = $request['content'];
           $objs->content_en = $request['content_en'];
           $objs->image = $filename;
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/hproject'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = hproject::find($id);
        $data['url'] = url('admin/hproject/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.hproject.edit', $data);
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
            'header' => 'required',
            'content_en' => 'required',
            'content' => 'required'
           ]);

           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            if($image == NULL){

                $objs = hproject::find($id);
                $objs->header = $request['header'];
                $objs->content = $request['content'];
                $objs->content_en = $request['content_en'];
                $objs->status = $status;
                $objs->save();

            }else{

                $img = DB::table('hprojects')
                ->where('id', $id)
                ->first();

                if($img->image){

                    $file_path = 'img/hproject/'.$img->image;
                    unlink($file_path);

                }

                $path = 'img/hproject/';
                $filename = time()."-".$image->getClientOriginalName();
                $image->move($path, $filename);


                $objs = hproject::find($id);
                $objs->header = $request['header'];
                $objs->content = $request['content'];
                $objs->content_en = $request['content_en'];
                $objs->status = $status;
                $objs->image = $filename;
                $objs->save();

            }

           

            return redirect(url('admin/hproject/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_hproject($id)
    {

        $objs = DB::table('hprojects')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/hproject/'.$objs->image;
               unlink($file_path);
            }
        //
        $obj = hproject::find($id);
        $obj->delete();

        return redirect(url('admin/hproject/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
