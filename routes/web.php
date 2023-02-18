<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeConController;
use App\Http\Controllers\NewConController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AllianceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/product', function () {
    return view('product');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('product_detail/{id}', [App\Http\Controllers\HomeController::class, 'product_detail']);

Route::get('/service', [App\Http\Controllers\HomeController::class, 'service']);

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);

Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog']);
Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'getArticles']);

Route::get('/blog_detail/{id}', [App\Http\Controllers\HomeController::class, 'blog_detail']);

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);

Route::get('/category', [App\Http\Controllers\HomeController::class, 'category']);

Route::get('/category_find', [App\Http\Controllers\HomeController::class, 'getCategory']);


Route::get('/term', function () {
    return view('term');
});

Route::post('/api/add_contact', [App\Http\Controllers\HomeController::class, 'add_contact']);

Auth::routes();

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::resource('/admin/category', CategoryController::class);
    Route::post('/api/api_post_status_category', [App\Http\Controllers\CategoryController::class, 'api_post_status_category']);
    Route::get('api/del_cat/{id}', [App\Http\Controllers\CategoryController::class, 'del_cat']);

    Route::resource('/admin/product', ProductController::class);
    Route::post('/api/api_post_status_product', [App\Http\Controllers\ProductController::class, 'api_post_status_product']);
    Route::get('api/del_pro/{id}', [App\Http\Controllers\ProductController::class, 'del_pro']);

    Route::resource('/admin/certificate', CertificateController::class);
    Route::post('/api/api_post_status_certificate', [App\Http\Controllers\CertificateController::class, 'api_post_status_certificate']);
    Route::get('api/del_cer/{id}', [App\Http\Controllers\CertificateController::class, 'del_cer']);

    Route::resource('/admin/brands', BrandController::class);
    Route::post('/api/api_post_status_brands', [App\Http\Controllers\BrandController::class, 'api_post_status_brands']);
    Route::get('api/del_ban/{id}', [App\Http\Controllers\BrandController::class, 'del_ban']);

    Route::resource('/admin/type_contact', TypeConController::class);
    Route::post('/api/api_post_status_cons', [App\Http\Controllers\TypeConController::class, 'api_post_status_cons']);
    Route::get('api/del_con/{id}', [App\Http\Controllers\TypeConController::class, 'del_con']);

    Route::resource('/admin/news', NewConController::class);
    Route::post('/api/api_post_status_news', [App\Http\Controllers\NewConController::class, 'api_post_status_news']);
    Route::get('api/del_news/{id}', [App\Http\Controllers\NewConController::class, 'del_news']);
    
    Route::post('api/upload_img', [NewConController::class, 'storeImage']);
   
    Route::get('admin/contact/', [App\Http\Controllers\ContactController::class, 'index']);
    Route::post('/api/api_post_status_contact', [App\Http\Controllers\ContactController::class, 'api_post_status_contact']);

    Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);

    Route::resource('/admin/slide_show', SlideController::class);
    Route::post('/api/api_post_status_slide', [App\Http\Controllers\SlideController::class, 'api_post_status_slide']);
    Route::get('api/del_slide/{id}', [App\Http\Controllers\SlideController::class, 'del_slide']);

    Route::get('admin/setting/', [App\Http\Controllers\SettingController::class, 'index']);
    Route::post('api/post_setting/', [App\Http\Controllers\SettingController::class, 'post_setting']);

    Route::get('admin/recommend/', [App\Http\Controllers\ProductController::class, 'recommend']);

    Route::get('/admin/subcat/create/{id}', [App\Http\Controllers\SubCatController::class, 'create']);


    Route::post('/api/api_post_status_subcat', [App\Http\Controllers\SubCatController::class, 'api_post_status_subcat']);
    Route::get('api/del_subcat/{id}', [App\Http\Controllers\SubCatController::class, 'del_subcat']);
    Route::post('/admin/subcat', [App\Http\Controllers\SubCatController::class, 'store']);
    Route::get('/admin/subcat/{id}/edit', [App\Http\Controllers\SubCatController::class, 'edit']);
    Route::post('/admin/post_subcat/{id}', [App\Http\Controllers\SubCatController::class, 'update']);


    Route::resource('/admin/alliance', AllianceController::class);
    Route::post('/api/api_post_status_alliance', [App\Http\Controllers\AllianceController::class, 'api_post_status_alliance']);
    Route::get('api/del_alliance/{id}', [App\Http\Controllers\AllianceController::class, 'del_alliance']);
    
    Route::post('/api/upload_img_product/{id}', [App\Http\Controllers\ProductController::class, 'upload_img_product']);
    Route::get('/api/image_del/{id}', [App\Http\Controllers\ProductController::class, 'image_del']);
 
 
});
