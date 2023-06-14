<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\NewsPosts;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function FrontHome()
    {
        $homeData = HomeAdvertisement::where('id',1)->first();
        $settingData = Setting::where('id',1)->first();
        $postData = NewsPosts::with('rSubCategory')->orderBy('id','desc')->get();
        $subCategoryData = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home_page','show')->get();
        return view('frontend.home',compact('homeData','settingData','postData','subCategoryData'));
    }
    public function FrontAbout()
    {
        return view('frontend.about');
    }
}
