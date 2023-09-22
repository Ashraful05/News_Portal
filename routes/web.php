<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeAdvertisementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\NewsPostsController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\front\FrontSubCategoryController;
use App\Http\Controllers\front\FrontPhotoController;
use App\Http\Controllers\front\FrontVideoController;
use App\Http\Controllers\front\FrontPageController;
use App\Http\Controllers\front\SubscriberController;
use App\Http\Controllers\front\FrontArchiveController;
use App\Http\Controllers\front\FrontTagController;


use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminFAQController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
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


// Frontend routes.,,,,,,,,,
Route::controller(HomeController::class)->group(function(){
    Route::get('/','FrontHome')->name('front_home');
    Route::get('about','FrontAbout')->name('front_about');
    Route::get('subcategory-by-category/{id}','subCategoryByCategoryWithAjax');
    Route::post('search-result','searchResult')->name('search_result');
});
Route::controller(PostController::class)->group(function(){
   Route::get('news-details/{id}','NewsDetails')->name('news_details');
});
Route::controller(FrontSubCategoryController::class)->group(function(){
    Route::get('category/{id}','index')->name('category');
});
Route::controller(FrontPhotoController::class)->group(function(){
   Route::get('photo/gallery','photoGallery')->name('photo_gallery');
});
Route::controller(FrontVideoController::class)->group(function(){
   Route::get('video/gallery','videoGallery')->name('video_gallery');
});
Route::controller(FrontPageController::class)->group(function(){
   Route::get('about','aboutPage')->name('front_about');
   Route::get('faq','faqPage')->name('front_faq');
   Route::get('terms','termsPage')->name('front_terms');
   Route::get('privacy','privacyPage')->name('front_privacy');
   Route::get('disclaimer','disclaimerPage')->name('front_disclaimer');
   Route::get('login','loginPage')->name('front_login');
   Route::get('contact','contactPage')->name('front_contact');
   Route::post('contact-email-submit','contactEmailSubmit')->name('contact_email_submit');
   Route::post('poll-submit/{id}','onlinePollSubmit')->name('poll_submit');
   Route::get('previous-poll-result','onlinePollPreviousResult')->name('previous_poll_result');
});
Route::post('subscriber',[SubscriberController::class,'index'])->name('subscribe');
Route::get('subscriber/verify/{token}/{email}',[SubscriberController::class,'SubscriberVerification'])->name('subscriber_verification');
Route::post('archive/show',[FrontArchiveController::class,'showArchive'])->name('archive_show');
Route::get('archive/{year}/{month}',[FrontArchiveController::class,'showArchiveWithPagination'])->name('archive_with_pagination');
Route::get('tag/{tag_name}',[FrontTagController::class,'tagWisePost'])->name('show_tag_post');

//admin routes.........
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
Route::controller(HomeAdvertisementController::class)->prefix('admin/advertisement')
    ->middleware('admin:admin')
    ->group(function(){
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
Route::controller(CategoryController::class)->prefix('admin/category')
    ->middleware('admin:admin')
    ->group(function(){
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
Route::resource('admin/photo',AdminPhotoController::class)->middleware('admin:admin');
Route::resource('admin/video',AdminVideoController::class)->middleware('admin:admin');
Route::resource('admin/faq',AdminFAQController::class)->middleware('admin:admin');
Route::resource('admin/liveChannel',AdminLiveChannelController::class)->middleware('admin:admin');
Route::resource('admin/onlinePoll',AdminOnlinePollController::class)->middleware('admin:admin');

Route::get('admin/settings',[AdminSettingsController::class,'adminSettings'])->name('admin_settings')->middleware('admin:admin');
Route::post('admin/settings/update',[AdminSettingsController::class,'adminSettingsUpdate'])->name('admin_setting_update');

Route::controller(AdminPageController::class)->prefix('admin/page')
    ->middleware('admin:admin')
    ->group(function(){
   Route::get('about','editAboutPage')->name('edit_about_page');
   Route::post('about/update','updateAboutPage')->name('update_about_page');
   Route::get('faq','editFAQPage')->name('edit_faq_page');
   Route::post('faq/update','updateFAQPage')->name('update_faq_page');
   Route::get('terms','editTermsPage')->name('edit_terms_page');
   Route::post('terms/update','updateTermsPage')->name('update_terms_page');
   Route::get('privacy','editPrivacyPage')->name('edit_privacy_page');
   Route::post('privacy/update','updatePrivacyPage')->name('update_privacy_page');
   Route::get('disclaimer','editDisclaimerPage')->name('edit_disclaimer_page');
   Route::post('disclaimer/update','updateDisclaimerPage')->name('update_disclaimer_page');
   Route::get('login','editLoginPage')->name('edit_login_page');
   Route::post('update/login','updateLoginPage')->name('update_login_page');
   Route::get('contact','editContactPage')->name('edit_contact_page');
   Route::post('update/contact','updateContactPage')->name('update_contact_page');
});

Route::controller(AdminSubscriberController::class)->prefix('admin/subscriber')
    ->middleware('admin:admin')
    ->group(function (){
    Route::get('all','allSubscriber')->name('all_subscriber');
    Route::get('mail','mailToSubscriber')->name('mail_subscriber');
    Route::post('mail/submit','mailSendToSubscriber')->name('mail_send_to_subscriber');
});

