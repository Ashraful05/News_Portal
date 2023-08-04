<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
   public function editAboutPage()
   {
       $data = Page::where('id',1)->first();
       return view('admin.pages.about_page',compact('data'));
   }
   public function updateAboutPage(Request $request)
   {
       $request->validate([
           'about_title'=>'required',
           'about_detail'=>'required',
       ]);
       Page::where('id',1)->update([
           'about_title'=>$request->about_title,
           'about_detail'=>$request->about_detail,
           'about_status'=>$request->about_status
       ]);
       return redirect()->back()->with('success','Page Data Updated');
   }
    public function editFAQPage()
    {
        $data = Page::where('id',1)->first();
        return view('admin.pages.faq_page',compact('data'));
    }
    public function updateFAQPage(Request $request)
    {
        $request->validate([
            'faq_title'=>'required',
//            'faq_detail'=>'required',
        ]);
        Page::where('id',1)->update([
            'faq_title'=>$request->faq_title,
            'faq_detail'=>$request->faq_detail,
            'faq_status'=>$request->faq_status
        ]);
        return redirect()->back()->with('success','Page Data Updated');
    }
    public function editTermsPage()
    {
        $data = Page::where('id',1)->first();
        return view('admin.pages.terms_page',compact('data'));
    }
    public function updateTermsPage(Request $request)
    {
        $request->validate([
            'terms_title'=>'required',
        ]);
        Page::where('id',1)->update([
            'terms_title'=>$request->terms_title,
            'terms_detail'=>$request->terms_detail,
            'terms_status'=>$request->terms_status
        ]);
        return redirect()->back()->with('success','Terms Data Updated');
    }
    public function editPrivacyPage()
    {
        $data = Page::where('id',1)->first();
        return view('admin.pages.privacy_page',compact('data'));
    }
    public function updatePrivacyPage(Request $request)
    {
        $request->validate([
            'privacy_title'=>'required',
        ]);
        Page::where('id',1)->update([
            'privacy_title'=>$request->privacy_title,
            'privacy_detail'=>$request->privacy_detail,
            'privacy_status'=>$request->privacy_status
        ]);
        return redirect()->back()->with('success','Privacy Data Updated');
    }
    public function editDisclaimerPage()
    {
        $data = Page::where('id',1)->first();
        return view('admin.pages.disclaimer_page',compact('data'));
    }
    public function updateDisclaimerPage(Request $request)
    {
        $request->validate([
            'disclaimer_title'=>'required',
        ]);
        Page::where('id',1)->update([
            'disclaimer_title'=>$request->disclaimer_title,
            'disclaimer_detail'=>$request->disclaimer_detail,
            'disclaimer_status'=>$request->disclaimer_status
        ]);
        return redirect()->back()->with('success','Disclaimer Data Updated');
    }

    public function editLoginPage()
    {
        $data = Page::where('id',1)->first();
        return view('admin.pages.login_page',compact('data'));
    }
    public function updateLoginPage(Request $request)
    {
        $request->validate([
            'login_title'=>'required',
        ]);
        Page::where('id',1)->update([
            'login_title'=>$request->login_title,
            'login_status'=>$request->login_status
        ]);
        return redirect()->back()->with('success','Login Data Updated');
    }

}
