<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
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
Route::controller(HomeAdvertisementController::class)->prefix('admin/advertisement')->group(function(){
   Route::get('home','HomeAdvertisementShow')->name('home_advertisement')->middleware('admin:admin');
});
