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

}
