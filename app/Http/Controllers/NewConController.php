<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class NewConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = news::paginate(7);
        $objs->setPath('');
        return view('admin.news.index', compact('objs'));
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
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
        $data['url'] = url('admin/news');
        return view('admin.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function api_post_status_news(Request $request){

        $user = news::findOrFail($request->user_id);

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


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'detail' => 'required',
            'image' => 'required'
        ]);

        $image = $request->file('image');

           $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        })->save('media/'.$input['imagename']);

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }
     
           $objs = new news();
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->image = $input['imagename'];
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           return redirect(url('admin/news'))->with('add_success','??????????????? ??????????????????????????????????????????????????????');

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
        $objs = news::find($id);
        $data['url'] = url('admin/news/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.news.edit', $data);
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
            'sub_title' => 'required',
            'detail' => 'required',
           ]);
           
           $image = $request->file('image');

           $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

           if($image == NULL){

           $objs = news::find($id);
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           }else{

            $img = DB::table('news')
          ->where('id', $id)
          ->first();

          $file_path = 'media/'.$img->image;
          unlink($file_path);

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(250, 250, function ($constraint) {
          $constraint->aspectRatio();
          })->save('media/'.$input['imagename']);
     
           $objs = news::find($id);
           $objs->title = $request['title'];
           $objs->sub_title = $request['sub_title'];
           $objs->detail = $request['detail'];
           $objs->type = $request['type'];
           $objs->image = $input['imagename'];
           $objs->type = 0;
           $objs->status = $status;
           $objs->save();

           }

           return redirect(url('admin/news/'.$id.'/edit'))->with('edit_success','????????????????????????????????????????????????????????? ??????????????????');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_news($id)
    {
        //
        $objs = DB::table('news')
            ->where('id', $id)
            ->first();

            if(isset($objs->image)){
              $file_path = 'media/'.$objs->image;
               unlink($file_path);
            }

        $obj = news::find($id);
        $obj->delete();

        return redirect(url('admin/news/'))->with('del_success','???????????????????????????????????????????????? ??????????????????');
    }
}
