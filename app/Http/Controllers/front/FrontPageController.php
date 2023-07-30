<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function aboutPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.about',compact('pageData'));
    }
}
