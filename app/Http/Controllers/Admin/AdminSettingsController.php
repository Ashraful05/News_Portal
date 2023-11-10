<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function adminSettings()
    {
        $setting = Setting::where("id",1)->first();
//        return $setting;
        return view('admin.settings.settings',compact('setting'));
    }
    public function adminSettingsUpdate(Request $request)
    {
        $request->validate([
           'news_ticker_total'=>'required'
        ]);

        $setting = Setting::where('id',1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;
        $setting->video_total = $request->video_total;
        $setting->video_status = $request->video_status;

        if($request->hasFile('logo')){
            $request->validate([
                'logo'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($setting->logo != ''){
                unlink(public_path('uploads/'.$setting->logo));
            }
            $now = time();
            $ext = $request->file('logo')->extension();
            $finalName = 'logo_'.$now.'.'.$ext;
            $request->file('logo')->move(public_path('uploads'),$finalName);
            $setting->logo = $finalName;
        }
        if($request->hasFile('favicon')){
            $request->validate([
                'favicon'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($setting->favicon != ''){
                unlink(public_path('uploads/'.$setting->favicon));
            }
            $ext = $request->file('favicon')->extension();
            $finalName = 'favicon_'.'.'.$ext;
            $request->file('favicon')->move(public_path('uploads'),$finalName);
            $setting->favicon = $finalName;
        }
        $setting->update();
        return redirect()->route('admin_settings')->with('success','Info Updated');
    }
}
