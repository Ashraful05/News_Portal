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
//        return $request->all();
        $request->validate([
           'news_ticker_total'=>'required'
        ]);

        $setting = Setting::where('id',1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;
        $setting->video_total = $request->video_total;
        $setting->video_status = $request->video_status;

        $setting->top_bar_date_status = $request->top_bar_date_status;
        $setting->top_bar_email = $request->top_bar_email;
        $setting->top_bar_email_status = $request->top_bar_email_status;

        $setting->theme_color_1 = $request->theme_color_1;
        $setting->theme_color_2 = $request->theme_color_2;

        $setting->analytic_id = $request->analytic_id;
        $setting->analytic_id_status = $request->analytic_id_status;

        $setting->disqus_code = $request->disqus_code;



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



//        dd($setting);
        $setting->update();
//        return $setting;
        return redirect()->route('admin_settings')->with('success','Info Updated');
    }
}
