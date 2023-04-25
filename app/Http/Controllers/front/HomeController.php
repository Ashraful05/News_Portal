<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function FrontHome()
    {
        return view('frontend.home');
    }
    public function FrontAbout()
    {
        return view('frontend.about');
    }
}
