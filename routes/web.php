<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\NewsPostsController;
use App\Http\Controllers\front\HomeController;
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

//Route::get('/', function () {
//    return view('frontend.frontend_master');
//});
Route::controller(HomeController::class)->group(function(){
    Route::get('/','FrontHome')->name('front_home');
    Route::get('about','FrontAbout')->name('front_about');

});


Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('login','AdminLogin')->name('admin_login');
    Route::post('login-submit','AdminLoginSubmit')->name('admin_login_submit');
    Route::get('logout','AdminLogout')->name('admin_logout');
    Route::get('home','Index')->name('admin_home')->middleware('admin:admin');
    Route::get('forget-password','ForgetPassword')->name('admin_forget_password');
    Route::post('forget-password-submit','ForgetPasswordSubmit')->name('admin_forget_password_submit');
    Route::get('reset-password/{token}/{email}','ResetPassword')->name('admin_reset_password');
    Route::post('reset-password-submit','ResetPasswordSubmit')->name('admin_reset_password_submit');
    Route::get('edit-profile','ProfileInfo')->name('admin_profile_edit')->middleware('admin:admin');
    Route::post('update-profile','ProfileInfoUpdate')->name('admin_profile_update');
});
Route::controller(HomeAdvertisementController::class)->prefix('admin/advertisement')->middleware('admin:admin')->group(function(){
   Route::get('home','HomeAdvertisementShow')->name('home_advertisement');
   Route::post('home-update','HomeAdvertisementUpdate')->name('home_advertisement_update');
   Route::get('top','TopAdvertisementShow')->name('top_advertisement');
   Route::post('top-update','TopAdvertisementUpdate')->name('top_advertisement_update');
   Route::get('sidebar-show','SidebarAdvertisementShow')->name('sidebar_advertisement_view');
   Route::get('sidebar-create','SidebarAdvertisementCreate')->name('sidebar_advertisement_create');
   Route::post('sidebar-save','SidebarAdvertisementSave')->name('sidebar_advertisement_save');
   Route::get('sidebar-edit/{id}','SidebarAdvertisementEdit')->name('sidebar_advertisement_edit');
   Route::post('sidebar-update/{id}','SidebarAdvertisementUpdate')->name('sidebar_advertisement_update');
   Route::get('sidebar-delete/{id}','SidebarAdvertisementDelete')->name('sidebar_advertisement_delete');
});
Route::controller(CategoryController::class)->prefix('admin/category')->middleware('admin:admin')->group(function(){
   Route::get('show','CategoryShow')->name('admin_category_show');
   Route::get('create','CategoryCreate')->name('admin_category_create');
   Route::post('save','CategorySave')->name('admin_category_save');
   Route::get('edit/{id}','CategoryEdit')->name('admin_category_edit');
   Route::post('update/{id}','CategoryUpdate')->name('admin_category_update');
   Route::get('delete/{id}','CategoryDelete')->name('admin_category_delete');
});
Route::resource('admin/subcategory',SubCategoryController::class)->middleware('admin:admin');
Route::resource('admin/newspost',NewsPostsController::class)->middleware('admin:admin');
Route::get('admin/newspost/delete_tag/{id}/{id1}',[NewsPostsController::class,'AdminNewsPostTagDelete'])->name('admin_newspost_delete_tag');
