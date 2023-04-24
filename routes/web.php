<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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
