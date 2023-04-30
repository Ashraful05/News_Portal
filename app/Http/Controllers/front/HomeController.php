<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function FrontHome()
    {
        $homeData = HomeAdvertisement::where('id',1)->first();
        return view('frontend.home',compact('homeData'));
    }
    public function FrontAbout()
    {
        return view('frontend.about');
    }
}
