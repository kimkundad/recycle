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
use App\Models\product_image;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Mail\Contacted;
use App\Models\hproject;


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
     * Show the application dashboard. sort
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $blog = news::where('status', 1)->whereDate('startdate', '<=', date("Y-m-d"))->orderby('id', 'desc')->limit(3)->get();
      $data['blog'] = $blog;

      $ban = alliance::where('status', 1)->get();
      $data['ban'] = $ban;

      $cer = certificate::where('status', 1)->orderby('sort', 'asc')->get();
      $data['cer'] = $cer;

      $slide = slideshow::where('status', 1)->orderby('id', 'desc')->get();
      $data['slide'] = $slide;

      $pro = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*',
        'unit_products.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')
        ->where('products.type_pro', 2)
        ->where('products.status', 1)
        ->orderBy('products.sort', 'asc')
        ->limit(12)
        ->get();

      $data['pro'] = $pro;

      return view('welcome', $data);
    }

    public function certificate(){

      $objs = certificate::orderby('sort', 'asc')->get();

      $data['objs'] = $objs;

      return view('certificate', $data);
    }

    public function service(){

      $hpro = hproject::where('status', 1)->get();
      $data['hpro'] = $hpro;

      $pro = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'products.status as status1',
        'categories.*',
        'unit_products.*'
        )
        ->leftjoin('categories', 'categories.id',  'products.cat_id')
        ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')
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


      $objs = news::where('status', 1)->whereDate('startdate', '<=', date("Y-m-d"))->orderby('id', 'desc')->limit(1)->get();
      $data['objs'] = $objs;

      return view('blog', $data);
    }


    public function getArticles(Request $request)
    {

      $objs = news::where('status', 1)->whereDate('startdate', '<=', date("Y-m-d"))->orderby('id', 'desc')->first();

        $results = news::where('status', 1)->where('id', '!=', $objs->id)->whereDate('startdate', '<=', date("Y-m-d"))->orderby('id', 'desc')->paginate(6);
        $artilces = '';

        if(session()->get('locale') == 'th'){

          if ($request->ajax()) {
            foreach ($results as $result) {

                $url = url('blog_detail/'.$result->id);
                $img = url('media/'.$result->image);
                $artilces.='<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 "><div class="ps-post"><div class="ps-post__thumbnail" style="overflow: hidden; max-height: 190px; min-height: 190px;"><a class="ps-post__overlay" href="'.$url.'"></a><img src="'.$img.'" alt="'.$result->title.'" style="max-height: 190px; min-height: 190px;"></div><div class="ps-post__content"><a class="ps-post__title" style="min-height: 72px; max-height: 72px; overflow: hidden;"  href="'.$url.'">'.$result->title.'</a><p style="min-height: 68px; max-height: 68px; overflow: hidden;">'.$result->sub_title.'</p><a class="ps-btn ps-btn--fullwidth-green"  href="'.$url.'">อ่านต่อ</a></div></div></div>';
            }
            return $artilces;
        }

        }else{

          if ($request->ajax()) {
            foreach ($results as $result) {

                if($result->title_en == null){

                    $url = url('blog_detail/'.$result->id);
                    $img = url('media/'.$result->image);
                    $artilces.='<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 "><div class="ps-post"><div class="ps-post__thumbnail" style="overflow: hidden; max-height: 190px; min-height: 190px;"><a class="ps-post__overlay" href="'.$url.'"></a><img src="'.$img.'" alt="'.$result->title.'" style="max-height: 190px; min-height: 190px;"></div><div class="ps-post__content"><a class="ps-post__title" style="min-height: 72px; max-height: 72px; overflow: hidden;"  href="'.$url.'">'.$result->title.'</a><p style="min-height: 68px; max-height: 68px; overflow: hidden;">'.$result->sub_title.'</p><a class="ps-btn ps-btn--fullwidth-green"  href="'.$url.'">อ่านต่อ</a></div></div></div>';


                }else{

                    $url = url('blog_detail/'.$result->id);
                    $img = url('media/'.$result->image);
                    $artilces.='<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 "><div class="ps-post"><div class="ps-post__thumbnail" style="overflow: hidden; max-height: 190px; min-height: 190px;"><a class="ps-post__overlay" href="'.$url.'"></a><img src="'.$img.'" alt="'.$result->title_en.'" style="max-height: 190px; min-height: 190px;"></div><div class="ps-post__content"><a class="ps-post__title" style="min-height: 72px; max-height: 72px; overflow: hidden;"  href="'.$url.'">'.$result->title_en.'</a><p style="min-height: 68px; max-height: 68px; overflow: hidden;">'.$result->sub_title_en.'</p><a class="ps-btn ps-btn--fullwidth-green"  href="'.$url.'">Read more</a></div></div></div>';

                }

            }
            return $artilces;
        }

        }

        return view('blog');
    }

    public function getModal(Request $request){

      $data_id = $request['data_id'];

      $data = certificate::where('id', $data_id)->first();

      $artilces = '';
      $img = url('img/certificate/'.$data->image);
        if ($request->ajax()) {
          $artilces.='<h4 class="text-gray-400 fs-16px">'.$data->name.'</h4><img src="'.$img.'" class="img-fluid" style="width: 100%">';
          return $artilces;
        }

    }

    public function getRecomment(Request $request)
    {

      $results = DB::table('products')->select(
        'products.*',
        'products.id as id_q',
        'unit_products.*'
        )
        ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->orderBy('products.id', 'desc')->where('products.status', 1)->where('products.type_pro', 2)->paginate(12);

        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $u) {

                $url = url('product_detail/'.$u->id_q);
                $img = url('images/wpnrayong/product/'.$u->image_pro);
                $discount = ($u->amount * $u->discount) / 100 ;

                if($u->discount == 0){

                  if($u->typePrice == 1){
                    if(session()->get('locale') == 'th'){
                      $price_text = '<p class="ps-product__price text-green"><a href="'.url('/contact').'"><b>ติดต่อฝ่ายขาย</b></a></p>';
                    }else{
                      $price_text = '<p class="ps-product__price text-green"><a href="'.url('/contact').'"><b>Contact Seller</b></a></p>';
                    }

                  }else{

                    if($u->unit_id !== 3 && $u->unit_id !== null){
                      $price_text = '<p class="ps-product__price text-green">฿'.number_format($u->amount, 2).'<b>'. $u->name_unit .'</b> </p>';
                    }else{
                      $price_text = '<p class="ps-product__price text-green">฿'.number_format($u->amount, 2).' </p>';
                    }

                  }

                }else{


                  if($u->typePrice == 1){
                    if(session()->get('locale') == 'th'){
                      $price_text = '<p class="ps-product__price sale"><a href="'.url('/contact').'"><b>ติดต่อฝ่ายขาย</b></a></p>';
                    }else{
                      $price_text = '<p class="ps-product__price sale"><a href="'.url('/contact').'"><b>Contact Seller</b></a></p>';
                    }

                  }else{

                  if($u->unit_id !== 3 && $u->unit_id !== null){
                    $price_text = '<p class="ps-product__price sale">฿'.number_format($u->amount-$discount, 2).' <del>฿'.number_format($u->amount, 2).' </del><b>'. $u->name_unit .'</b></p>';
                  }else{
                    $price_text = '<p class="ps-product__price sale">฿'.number_format($u->amount-$discount, 2).' <del>฿'.number_format($u->amount, 2).' </del></p>';
                  }

                }

                }

                if($u->image_pro == 0){

                }else{

                }

                if(session()->get('locale') == 'th'){

                    $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div></div></div></div>';

                }else{

                    if($u->name_pro_en == null){

                        $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div></div></div></div>';

                    }else{

                        $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro_en.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro_en.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">View</a></div></div></div></div>';

                    }
                }
            }
            return $artilces;
        }
        return view('blog');
    }


    public function getCategory(Request $request)
    {
      $search = $request['search'];
      $cat = $request['category'];
      $brand = $request['brand'];
    //  $data_b = explode(",",$brand); $count = product::where('name_pro', 'like', "%$search%")->count();

      $data_b = ($brand != '')?explode(",",$brand):0;


      if($cat == 0){

        if($data_b == 0){

          if($search == ''){
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->orderBy('products.mysort', 'asc')->where('products.status', 1)->paginate(12);
          }else{
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->orderBy('products.mysort', 'asc')->where('products.name_pro', 'like', "%$search%")->where('products.status', 1)->paginate(12);
          }


        }else{

          if($search == ''){
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->whereIn('products.brand', $data_b)->orderBy('products.mysort', 'asc')->where('products.status', 1)->paginate(12);
          }else{
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->whereIn('products.brand', $data_b)->where('products.name_pro', 'like', "%$search%")->where('products.status', 1)->orderBy('products.mysort', 'asc')->paginate(12);
          }

        }

      }else{

        if($data_b == 0){

          if($search == ''){

            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->where('products.sub_cat_id', $cat)->orderBy('products.mysort', 'asc')->where('products.status', 1)->paginate(12);

          }else{
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->where('products.sub_cat_id', $cat)->where('products.name_pro', 'like', "%$search%")->where('products.status', 1)->orderBy('products.mysort', 'asc')->paginate(12);
          }

        }else{

          if($search == ''){
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->where('products.sub_cat_id', $cat)->whereIn('products.brand', $data_b)->orderBy('products.mysort', 'asc')->where('products.status', 1)->paginate(12);
          }else{
            $results = DB::table('products')->select(
              'products.*',
              'products.id as id_q',
              'unit_products.*'
              )
              ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')->where('products.mysort', '!=', 0)->where('products.sub_cat_id', $cat)->where('products.name_pro', 'like', "%$search%")->whereIn('products.brand', $data_b)->where('products.status', 1)->orderBy('products.mysort', 'asc')->paginate(12);
          }

        }

      }

        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $u) {

                $url = url('product_detail/'.$u->id_q);
                $img = url('images/wpnrayong/product/'.$u->image_pro);
                $discount = ($u->amount * $u->discount) / 100 ;

                if($u->discount == 0){

                  if($u->typePrice == 1){
                    if(session()->get('locale') == 'th'){
                      $price_text = '<p class="ps-product__price text-green"><a href="'.url('/contact').'"><b>ติดต่อฝ่ายขาย</b></a></p>';
                    }else{
                      $price_text = '<p class="ps-product__price text-green"><a href="'.url('/contact').'"><b>Contact Seller</b></a></p>';
                    }
                  }else{

                    if($u->unit_id !== 3 && $u->unit_id !== null){
                      $price_text = '<p class="ps-product__price text-green">฿'.number_format($u->amount, 2).'<b>'. $u->name_unit .'</b> </p>';
                    }else{
                      $price_text = '<p class="ps-product__price text-green">฿'.number_format($u->amount, 2).' </p>';
                    }

                  }

                }else{


                  if($u->typePrice == 1){
                    if(session()->get('locale') == 'th'){
                      $price_text = '<p class="ps-product__price sale"><a href="'.url('/contact').'"><b>ติดต่อฝ่ายขาย</b></a></p>';
                    }else{
                      $price_text = '<p class="ps-product__price sale"><a href="'.url('/contact').'"><b>Contact Seller</b></a></p>';
                    }
                  }else{

                  if($u->unit_id !== 3 && $u->unit_id !== null){
                    $price_text = '<p class="ps-product__price sale">฿'.number_format($u->amount-$discount, 2).' <del>฿'.number_format($u->amount, 2).' </del><b>'. $u->name_unit .'</b></p>';
                  }else{
                    $price_text = '<p class="ps-product__price sale">฿'.number_format($u->amount-$discount, 2).' <del>฿'.number_format($u->amount, 2).' </del></p>';
                  }

                }

                }

                if($u->image_pro == 0){

                }else{

                }

                if(session()->get('locale') == 'th'){

                    $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div></div></div></div>';

                }else{

                    if($u->name_pro_en == null){

                        $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div></div></div></div>';

                    }else{

                        $artilces.='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10 fix-pad"><div class="ps-product"><div class="ps-product__thumbnail h-min-set" ><a href="'.$url.'"><img src="'.$img.'" alt="'.$u->name_pro_en.'" /></a></div><div class="ps-product__container"><a class="ps-product__vendor" href="#">'.$u->name_pro_en.'</a><div class="ps-product__content">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">ดูข้อมูลสินค้า</a></div><div class="ps-product__content hover">'.$price_text.'<a class="ps-btn ps-btn--fullwidth-green" href="'.$url.'">View</a></div></div></div></div>';

                    }
                }


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
      $search = $request['search'];

      if($request['id'] == 0){

        if($search == ''){
          $count = product::count();
        }else{
          $count = product::where('name_pro', 'like', "%$search%")->count();
        }

      }else{

        if($search == ''){

          $count = product::where('cat_id', $request['id'])->count();

        }else{

          $count = product::where('cat_id', $request['id'])->where('name_pro', 'like', "%$search%")->count();

        }
      }

      $data['count'] = $count;
      $data['category_id'] = $request['id'];
      $data['search'] = $search;
      return view('category', $data);

    }

    public function recomment(Request $request){

      $count = product::where('type_pro', 2)->where('status', 1)->count();

      $data['count'] = $count;
      return view('recomment', $data);

    }

    public function product_detail($id){

      $img = product_image::where('product_id', $id)->get();
      $data['img'] = $img;

      // $pro = DB::table('products')->select(
      //   'products.*',
      //   'products.id as id_q',
      //   'products.status as status1',
      //   'categories.*'
      //   )
      //   ->leftjoin('categories', 'categories.id',  'products.cat_id')
      //   ->where('products.type_pro', 2)
      //   ->limit(6)
      //   ->get();

        $pro = DB::table('products')->select(
          'products.*',
          'products.id as id_q',
          'products.status as status1',
          'categories.*',
          'unit_products.*'
          )
          ->leftjoin('categories', 'categories.id',  'products.cat_id')
          ->leftjoin('unit_products', 'unit_products.id',  'products.unit_id')
          ->where('products.type_pro', 2)
          ->where('products.status', 1)
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

        if(isset($objs->brand)){
        $brand = brand::where('id', $objs->brand)->first();
        $data['brand'] = $brand;
        }else{
        $data['brand'] = null;
        }



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



        $mailData = [
          'name' => $request['name'],
          'email' => $request['email'],
          'phone' => $request['phone'],
          'type' => $data_contact,
          'messenger' => $request['massage']
        ];

      //   $subscriber = Contacted::create([
      //     'mydata' => $mailData
      // ]);


        Mail::to('sales@wpnrayong.com')->send(new Contacted($mailData));


        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);
            }
    }
}
