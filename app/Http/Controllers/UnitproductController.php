<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unit_product;
use App\Models\product;

class UnitproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = unit_product::paginate(30);
        if(isset($objs)){
            foreach($objs as $u){
                $u->option = product::where('unit_id', $u->id)->count();
            }
        }
        $objs->setPath('');
        return view('admin.unit_product.index', compact('objs'));
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
        $data['url'] = url('admin/unit_product');
        return view('admin.unit_product.create', $data);
    }


    public function api_post_status_unit_product(Request $request){

        $user = unit_product::findOrFail($request->user_id);

              if($user->unit_status == 1){
                  $user->unit_status = 0;
              } else {
                  $user->unit_status = 1;
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
            'name_unit' => 'required'
           ]);
           

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new unit_product();
           $objs->name_unit = $request['name_unit'];
           $objs->unit_status = $status;
           $objs->save();

           return redirect(url('admin/unit_product'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = unit_product::find($id);
        $data['url'] = url('admin/unit_product/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.unit_product.edit', $data);
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
            'name_unit' => 'required'
           ]);
           

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            $objs = unit_product::find($id);
            $objs->name_unit = $request['name_unit'];
            $objs->unit_status = $status;
            $objs->save();

           return redirect(url('admin/unit_product/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_unit_product($id)
    {


        if($id !== "3"){

        product::where('unit_id', $id)
       ->update([
           'unit_id' => 3
        ]);

        //
        $obj = unit_product::find($id);
        $obj->delete();
    }

        return redirect(url('admin/unit_product/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
