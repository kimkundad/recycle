<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\type_contact;
use App\Models\slideshow;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use App\Models\brand;
use App\Models\certificate;
use App\Models\news;
use App\Models\alliance;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $blog = news::where('status', 1)->orderby('id', 'desc')->limit(3)->get();
      $data['blog'] = $blog;

      $ban = alliance::where('status', 1)->get();
      $data['ban'] = $ban;

      $cer = certificate::where('status', 1)->get();
      $data['cer'] = $cer;

      $slide = slideshow::where('status', 1)->get();
      $data['slide'] = $slide;

      $pro = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->where('products.type_pro', 2)
        ->limit(12)
        ->get();

      $data['pro'] = $pro;

      return view('welcome', $data);
    }

    public function service(){

      $pro = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->where('products.type_pro', 2)
        ->limit(6)
        ->get();

      $data['pro'] = $pro;


      return view('service', $data);
    }

    public function about(){

      $ban = alliance::where('status', 1)->get();
      $data['ban'] = $ban;

      $cer = certificate::where('status', 1)->get();
      $data['cer'] = $cer;

      return view('about', $data);
    }

    public function blog(){

      $objs = news::where('status', 1)->orderby('id', 'desc')->limit(1)->get();
      $data['objs'] = $objs;

      return view('blog', $data);
    }


    public function getArticles(Request $request)
    {
        $results = news::orderBy('id')->paginate(6);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {

                $url = url('blog_detail/'.$result->id);
                $img = url('media/'.$result->image);
                $artilces.='<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 "><div class="ps-post"><div class="ps-post__thumbnail"><a class="ps-post__overlay" href="'.$url.'"></a><img src="'.$img.'" alt="'.$result->title.'"></div><div class="ps-post__content"><a class="ps-post__title"  href="'.$url.'">'.$result->title.'</a><p>'.$result->sub_title.'</p><a class="ps-btn ps-btn--fullwidth-green"  href="'.$url.'">อ่านต่อ</a></div></div></div>';
            }
            return $artilces;
        }
        return view('blog');
    }  


    public function getCategory(Request $request)
    {
      $cat = $request['category'];
      if($cat == 0){
        $results = product::orderBy('id')->paginate(12);
      }else{
        $results = product::where('cat_id', $cat)->orderBy('id')->paginate(12);
      }
       
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $u) {

                $url = url('product_detail/'.$u->id);
                $img = url('img/product/'.$u->image_pro);
                $discount = ($u->amount * $u->discount) / 100 ;

                if($u->discount == 0){
                  $price_text = '<p class="ps-product__price text-green">฿'.number_format($u->amount, 2).' </p>';
                }else{
                  $price_text = '<p class="ps-product__price sale">฿'.number_format($u->amount-$discount, 2).' <del>฿'.number_format($u->amount, 2).' </del></p>';
                }

                $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10"><div class="ps-product"><div class="ps-product__thumbnail"><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div></div></div></div>';
            }
            return $artilces;
        }
        return view('blog');
    }  



        

    


    public function blog_detail($id){

      $objs = news::find($id);
      $data['objs'] = $objs;

      DB::table('news')
            ->where('id', $id)
            ->update(['view' => $objs->view+1]);

      return view('blog_detail', $data);
    }
    
    public function category(Request $request){

      if($request['id'] == 0){
        $count = product::count();
      }else{
        $count = product::where('cat_id', $request['id'])->count();
      }
      
      $data['count'] = $count;
      $data['category_id'] = $request['id'];
      return view('category', $data);

    }

    public function product_detail($id){

      $pro = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->where('products.type_pro', 2)
        ->limit(6)
        ->get();

      $data['pro'] = $pro;

      $objs = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->where('products.id', $id)
        ->first();

      $data['objs'] = $objs;
      return view('product_detail', $data);

    }

    


    public function contact(){

      $objs = type_contact::where('status', 1)->get();
      $data['type_contact'] = $objs;
      return view('contact', $data);
      
    }

    public function add_contact(Request $request){
        

      
        $secret=env('reCAPTCHA');
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha_1.'
          ]
        ]);

      }else{

           $objs = new contact();
           $objs->name = $request['name'];
           $objs->email = $request['email'];
           $objs->phone = $request['phone'];
           $objs->type = $request['type'];
           $objs->messenger = $request['massage'];
           $objs->save();

           $data_contact = '';

           $con = type_contact::find($request['type']);

           $data_contact = $con->name;

        $message = "ข้อความจากหน้าติดต่อ หัวข้อติดต่อ : ". $data_contact ." ชื่อผู้ติดต่อ : ".$request['name'].", ".$request['email'].", ".$request['phone'].", ข้อความ : ".$request['massage'];
        $lineapi = env('line_token');
        

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);

        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);
            }
    }
}
