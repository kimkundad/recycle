<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slideshow;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = slideshow::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.slide.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function api_post_status_slide(Request $request){

        $user = slideshow::findOrFail($request->user_id);

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

    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/slide_show');
        return view('admin.slide.create', $data);
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
            'title' => 'required',
            'big_title' => 'required',
            'sub_title' => 'required',
            'image' => 'required'
           ]);
           
           $image = $request->file('image');

           $path = 'img/slide/';
            $filename = time()."-".$image->getClientOriginalName();
            $image->move($path, $filename);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }


        $g_btn = 0;
        if(isset($request['g_btn'])){
            if($request['g_btn'] == 1){
                $g_btn = 1;
            }
        }


        $w_btn = 0;
        if(isset($request['w_btn'])){
            if($request['w_btn'] == 1){
                $w_btn = 1;
            }
        }
     
           $objs = new slideshow();
           $objs->title = $request['title'];
           $objs->big_title = $request['big_title'];
           $objs->sub_title = $request['sub_title'];
           $objs->g_btn = $g_btn;
           $objs->g_btn_text = $request['g_btn_text'];
           $objs->g_btn_url = $request['g_btn_url'];
           $objs->w_btn = $w_btn;
           $objs->w_btn_text = $request['w_btn_text'];
           $objs->w_btn_url = $request['w_btn_url'];
           $objs->image = $filename;
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/slide_show'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = slideshow::find($id);
        $data['url'] = url('admin/slide_show/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.slide.edit', $data);
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
            'title' => 'required',
            'big_title' => 'required',
            'sub_title' => 'required'
           ]);
           
           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }


            $g_btn = 0;
            if(isset($request['g_btn'])){
                if($request['g_btn'] == 1){
                    $g_btn = 1;
                }
            }


            $w_btn = 0;
            if(isset($request['w_btn'])){
                if($request['w_btn'] == 1){
                    $w_btn = 1;
                }
            }

           if($image == NULL){

            $objs = slideshow::find($id);
            $objs->title = $request['title'];
            $objs->big_title = $request['big_title'];
            $objs->sub_title = $request['sub_title'];
            $objs->g_btn = $g_btn;
            $objs->g_btn_text = $request['g_btn_text'];
            $objs->g_btn_url = $request['g_btn_url'];
            $objs->w_btn = $w_btn;
            $objs->w_btn_text = $request['w_btn_text'];
            $objs->w_btn_url = $request['w_btn_url'];
            $objs->status = $status;
            $objs->save();

           }else{

          $img = DB::table('slideshows')
          ->where('id', $id)
          ->first();

          $file_path = 'img/slide/'.$img->image;
          unlink($file_path);

          $path = 'img/slide/';
          $filename = time()."-".$image->getClientOriginalName();
          $image->move($path, $filename);
     
           $objs = slideshow::find($id);
           $objs->title = $request['title'];
           $objs->big_title = $request['big_title'];
           $objs->sub_title = $request['sub_title'];
           $objs->g_btn = $g_btn;
           $objs->g_btn_text = $request['g_btn_text'];
           $objs->g_btn_url = $request['g_btn_url'];
           $objs->w_btn = $w_btn;
           $objs->w_btn_text = $request['w_btn_text'];
           $objs->w_btn_url = $request['w_btn_url'];
           $objs->image = $filename;
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/slide_show/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_slide($id)
    {
        //
        $objs = DB::table('slideshows')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/slide/'.$objs->image;
               unlink($file_path);
            }

        $obj = slideshow::find($id);
        $obj->delete();

        return redirect(url('admin/slide_show/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
