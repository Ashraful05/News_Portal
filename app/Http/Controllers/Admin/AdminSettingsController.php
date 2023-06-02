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
        $setting->update();
        return redirect()->route('admin_settings')->with('success','Info Updated');
    }
}
