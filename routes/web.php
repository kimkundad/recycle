<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\BrandController;

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

Route::get('/product', function () {
    return view('product');
});

Route::get('/product_detail', function () {
    return view('product_detail');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog_detail', function () {
    return view('blog_detail');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/term', function () {
    return view('term');
});

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
    

});
