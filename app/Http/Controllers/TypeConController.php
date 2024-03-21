<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_contact;

class TypeConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = type_contact::paginate(30);
        $objs->setPath('');
        return view('admin.type_contact.index', compact('objs'));
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
        $data['url'] = url('admin/type_contact');
        return view('admin.type_contact.create', $data);
    }

    public function api_post_status_cons(Request $request){

        $user = type_contact::findOrFail($request->user_id);

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
            'name_en' => 'required'
           ]);
           

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new type_contact();
           $objs->name = $request['name'];
           $objs->name_en = $request['name_en'];
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/type_contact'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = type_contact::find($id);
        $data['url'] = url('admin/type_contact/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.type_contact.edit', $data);
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
            'name' => 'required',
            'name_en' => 'required'
           ]);
           

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            $objs = type_contact::find($id);
            $objs->name = $request['name'];
            $objs->name_en = $request['name_en'];
            $objs->status = $status;
            $objs->save();

           return redirect(url('admin/type_contact/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_con($id)
    {
        //
        $obj = type_contact::find($id);
        $obj->delete();

        return redirect(url('admin/type_contact/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
