<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alliance;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;


class AllianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = alliance::paginate(30);
        $objs->setPath('');
        $data['objs'] = $objs;
        return view('admin.alliance.index', compact('objs'));
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
        $data['url'] = url('admin/alliance');
        return view('admin.alliance.create', $data);
    }

    public function api_post_status_alliance(Request $request){

        $user = alliance::findOrFail($request->user_id);

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
          $img->resize(250, 250, function ($constraint) {
          $constraint->aspectRatio();
        })->save('img/alliance/'.$input['imagename']);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new alliance();
           $objs->name = $request['name'];
           $objs->image = $input['imagename'];
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/alliance'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = alliance::find($id);
        $data['url'] = url('admin/alliance/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.alliance.edit', $data);
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

           $objs = alliance::find($id);
           $objs->name = $request['name'];
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('alliances')
          ->where('id', $id)
          ->first();

          $file_path = 'img/alliance/'.$img->image;
          unlink($file_path);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(250, 250, function ($constraint) {
          $constraint->aspectRatio();
          })->save('img/alliance/'.$input['imagename']);
     
           $objs = alliance::find($id);
           $objs->name = $request['name'];
           $objs->image = $input['imagename'];
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/alliance/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_ban($id)
    {
        //

        $objs = DB::table('alliances')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'img/alliance/'.$objs->image;
               unlink($file_path);
            }

        $obj = alliance::find($id);
        $obj->delete();

        return redirect(url('admin/alliance/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
