<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $faqData = Faq::get();
        return view('frontend.faq',compact('pageData','faqData'));
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
    public function contactPage()
    {
        $pageData = Page::where('id',1)->first();
        return view('frontend.contact',compact('pageData'));
    }
    public function contactEmailSubmit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        if(!$validator->passes())
        {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else{
            $adminData = Admin::where('id',1)->first();
            $subject = 'Contact Form Email';
            $message = 'Visitor Message Detail:<br>';
            $message .= '<b>Visitor Name: </b>'.$request->name.'<br>';
            $message .= '<b>Visitor Email: </b>'.$request->email.'<br>';
            $message .= '<b>Visitor Message: </b>'.$request->message.'<br>';
            Mail::to($adminData->email)->send(new Websitemail($subject,$message));
            return response()->json(['code'=>1,'success_message'=>'Email is Sent!!']);
        }
    }



}
