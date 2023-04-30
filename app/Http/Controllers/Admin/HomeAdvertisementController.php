<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request;

class HomeAdvertisementController extends Controller
{
    public function HomeAdvertisementShow()
    {
        $homeAddData = HomeAdvertisement::where('id',1)->first();
        return view('admin.home_advertisement',compact('homeAddData'));
    }
    public function HomeAdvertisementUpdate(Request $request)
    {
        $homeAddData = HomeAdvertisement::where('id',1)->first();
        if($request->hasFile('above_search_ad')){
            $request->validate([
               'above_search_ad'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('frontend/assets/uploads/'.$homeAddData->above_search_ad));
            $ext = $request->file('above_search_ad')->extension();
            $finalName = 'above_search_ad'.'.'.$ext;
            $request->file('above_search_ad')->move(public_path('frontend/assets/uploads/'),$finalName);
            $homeAddData->above_search_ad = $finalName;
        }
        if($request->hasFile('above_footer_ad')){
            $request->validate([
               'above_footer_ad'=>'image|mimes:jpg,jpeg,png,gif',
            ]);
            unlink(public_path('frontend/assets/uploads/'.$homeAddData->above_footer_ad));
            $ext = $request->file('above_footer_ad')->extension();
            $finalName = 'above_footer_ad'.'.'.$ext;
            $request->file('above_footer_ad')->move(public_path('frontend/assets/uploads/'),$finalName);
            $homeAddData->above_footer_ad = $finalName;
        }
        $homeAddData->above_search_ad_url = $request->above_search_ad_url;
        $homeAddData->above_search_ad_status = $request->above_search_ad_status;
        $homeAddData->above_footer_ad_url = $request->above_footer_ad_url;
        $homeAddData->above_footer_ad_status = $request->above_footer_ad_status;
        $homeAddData->update();
        return redirect()->back()->with('success','Data is updated successfully!');
    }
}
