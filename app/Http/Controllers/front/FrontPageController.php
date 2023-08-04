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
    public function faqPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.faq',compact('pageData'));
    }
    public function termsPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.terms',compact('pageData'));
    }
    public function privacyPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.privacy',compact('pageData'));
    }
    public function disclaimerPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.disclaimer',compact('pageData'));
    }
    public function loginPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.login',compact('pageData'));
    }



}
