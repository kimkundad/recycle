<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\certificate;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = certificate::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.certificate.index', compact('objs'));
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
        $data['url'] = url('admin/certificate');
        return view('admin.certificate.create', $data);
    }

    public function api_post_status_certificate(Request $request){

        $user = certificate::findOrFail($request->user_id);

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
            'name' => 'required',
            'image' => 'required'
           ]);
           
           $image = $request->file('image');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        })->save('img/certificate/'.$input['imagename']);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new certificate();
           $objs->name = $request['name'];
           $objs->image = $input['imagename'];
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/certificate'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = certificate::find($id);
        $data['url'] = url('admin/certificate/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.certificate.edit', $data);
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
            'name' => 'required'
           ]);
           
           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

           if($image == NULL){

           $objs = certificate::find($id);
           $objs->name = $request['name'];
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('categories')
          ->where('id', $id)
          ->first();

          $file_path = 'img/certificate/'.$img->image;
          unlink($file_path);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
            })->save('img/certificate/'.$input['imagename']);
     
           $objs = certificate::find($id);
           $objs->name = $request['name'];
           $objs->image = $input['imagename'];
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/certificate/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_cer($id)
    {
        //

        $objs = DB::table('certificates')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/certificate/'.$objs->image;
               unlink($file_path);
            }

        $obj = certificate::find($id);
        $obj->delete();

        return redirect(url('admin/certificate/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
