<?php

use App\Http\Middleware\EnsureAdminRole;
use Illuminate\Support\Facades\Route;

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

Route::get('/', "App\Http\Controllers\NomalPageController@index");

Route::get('/logout', "App\Http\Controllers\NomalPageController@logout");

Route::get('/dang-ky',"App\Http\Controllers\UserController@createNewAccount");
Route::post('/dang-ky', [
    'as' => 'savecreatenewaccount',
    'uses' => 'App\Http\Controllers\UserController@store'
]);

Route::get('/dang-nhap', "App\Http\Controllers\UserController@loginAccount");
Route::post('/dang-nhap', [
    'as' => 'loginaccount',
    'uses' => 'App\Http\Controllers\UserController@login'
]);

Route::get('/them-san-pham',"App\Http\Controllers\ProductController@createNewProduct");
Route::post('/save-product', [
    'as' => 'savecreateproduct',
    'uses' => 'App\Http\Controllers\ProductController@store'
]);

Route::get('/danh-sach-san-pham', "App\Http\Controllers\ProductController@index");
Route::get('/search', [
    'as' => 'search_form',
    'uses' => "App\Http\Controllers\ProductController@search_form"
]);

Route::get('san_pham/{id_san_pham}', "App\Http\Controllers\ProductController@show");

Route::get('/add-to-cart/{id_san_pham}', "App\Http\Controllers\ProductController@add_to_cart");
Route::get('/gio-hang', "App\Http\Controllers\NomalPageController@gio_hang");
Route::get('/update-gio-hang/{id_san_pham}', "App\Http\Controllers\ProductController@update_gio_hang");
Route::get('/xoa-item-gio-hang/{id_san_pham}', "App\Http\Controllers\ProductController@xoa_item_gio_hang");
Route::get('/xoa-gio-hang', "App\Http\Controllers\ProductController@xoa_gio_hang");

Route::get('/thanh-toan', "App\Http\Controllers\NomalPageController@thanh_toan");
Route::post('/thanh-toan', [
    'as' => 'save_thanh_toan',
    'uses' => "App\Http\Controllers\NomalPageController@thanh_toan_store"
]);

Route::get('/tin-tuc',"App\Http\Controllers\NomalPageController@tin_tuc");

Route::get('/lien-he', "App\Http\Controllers\NomalPageController@lien_he");
Route::post('/lien-he',"App\Http\Controllers\NomalPageController@lien_he_store");


// route admin
Route::get('/admins', "App\Http\Controllers\AdminController@index")->middleware(EnsureAdminRole::class);
Route::get('/login-admin', "App\Http\Controllers\AdminController@login_admin");
Route::get('/analytics-doanh-thu/{nam}', "App\Http\Controllers\AdminController@thong_ke")->middleware(EnsureAdminRole::class);

// route process manage product
Route::get('/admin/ql-san-pham', "App\Http\Controllers\ProductAdminController@index")->middleware(EnsureAdminRole::class);
Route::get('/admin/san-pham/delete/{id}', "App\Http\Controllers\ProductAdminController@destroy")->middleware(EnsureAdminRole::class);

Route::get('/admin/ql-san-pham/create', 'App\Http\Controllers\ProductAdminController@create')->middleware(EnsureAdminRole::class);
Route::post('/admin/ql-san-pham/create', 'App\Http\Controllers\ProductAdminController@store')->middleware(EnsureAdminRole::class);

Route::get('/admin/ql-san-pham/edit/{id}','App\Http\Controllers\ProductAdminController@edit')->middleware(EnsureAdminRole::class);
Route::post('/admin/ql-san-pham/edit/{id}','App\Http\Controllers\ProductAdminController@update')->middleware(EnsureAdminRole::class);

// generate data website url
Route::get('/generate-data/{table}',"App\Http\Controllers\GenerateDataController@index")->middleware(EnsureAdminRole::class);