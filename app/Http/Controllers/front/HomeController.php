<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\NewsPosts;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function FrontHome()
    {
        $homeData = HomeAdvertisement::where('id',1)->first();
        $settingData = Setting::where('id',1)->first();
        $postData = NewsPosts::orderBy('id','desc')->get();
        return view('frontend.home',compact('homeData','settingData','postData'));
    }
    public function FrontAbout()
    {
        return view('frontend.about');
    }
}
