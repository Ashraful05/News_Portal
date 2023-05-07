<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\TopAdvertisement;
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
    public function TopAdvertisementShow()
    {
        $topAddData = TopAdvertisement::where('id',1)->first();
        return view('admin.top_advertisement',compact('topAddData'));
    }
    public function TopAdvertisementUpdate(Request $request)
    {
        $topAddData = TopAdvertisement::where('id',1)->first();

        if($request->hasFile('top_search_ad')){
            $request->validate([
                'top_search_ad'=>'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('frontend/assets/uploads/'.$topAddData->top_search_ad));
            $ext = $request->file('top_search_ad')->extension();
            $finalName = 'top_search_ad'.'.'.$ext;
            $request->file('top_search_ad')->move(public_path('frontend/assets/uploads/'),$finalName);
            $topAddData->top_search_ad = $finalName;
        }

        $topAddData->top_search_ad_url = $request->top_search_ad_url;
        $topAddData->top_search_ad_status = $request->top_search_ad_status;
        $topAddData->update();

        return redirect()->back()->with('success','Data is updated successfully!');

    }
    public function SidebarAdvertisementShow()
    {
        $allData = SidebarAdvertisement::get();
        return view('admin.sidebar_advertisement_view',compact('allData'));
    }
    public function SidebarAdvertisementCreate()
    {
        return view('admin.sidebar_advertisement_create');
    }
    public function SidebarAdvertisementSave(Request $request)
    {
        $request->validate([
            'sidebar_ad'=>'required|image|mimes:jpg,jpeg,png,gif'
        ],[
            'sidebar_ad'=>'Sidebar Image is required'
        ]);
        if($request->hasFile('sidebar_ad')){
            $ext = $request->file('sidebar_ad')->extension();
            $finalName = 'sidebar_ad_'.time().'.'.$ext;
            $request->file('sidebar_ad')->move(public_path('uploads/'),$finalName);
            SidebarAdvertisement::create([
                'sidebar_ad'=>$finalName,
                'sidebar_ad_url'=>$request->sidebar_ad_url,
                'sidebar_ad_location'=>$request->sidebar_ad_location,
            ]);
            return redirect()->route('sidebar_advertisement_view')->with('success','Sidebar Ad Created!!');
        }
    }
    public function SidebarAdvertisementEdit($id)
    {
        $sidebarEdit = SidebarAdvertisement::findOrFail($id);
        return view('admin.sidebar_advertisement_edit',compact('sidebarEdit'));
    }
    public function SidebarAdvertisementUpdate(Request $request,$id)
    {

        $data = SidebarAdvertisement::findOrFail($id);
//        return $data->sidebar_ad;
        if($request->hasFile('sidebar_ad')){
//            return $request->all();
            $request->validate([
               'sidebar_ad'=>'required|image|mimes:jpg,png,gif,jpeg'
            ]);
            unlink(public_path('uploads/'.$data->sidebar_ad));
            $ext = $request->file('sidebar_ad')->extension();
            $finalName = 'sidebar_ad_'.time().'.'.$ext;
            $request->file('sidebar_ad')->move(public_path('uploads/'),$finalName);

            $data->update([
                'sidebar_ad'=>$finalName,
                'sidebar_ad_url'=>$request->sidebar_ad_url,
                'sidebar_ad_location'=>$request->sidebar_ad_location,
            ]);
//            SidebarAdvertisement::update([
//                'sidebar_ad'=>$finalName,
//                'sidebar_ad_url'=>$request->sidebar_ad_url,
//                'sidebar_ad_location'=>$request->sidebar_ad_location,
//            ]);
        }else{
            $data->update([
                'sidebar_ad_url'=>$request->sidebar_ad_url,
                'sidebar_ad_location'=>$request->sidebar_ad_location,
            ]);
        }
        return redirect()->route('sidebar_advertisement_view')->with('success','Sidebar Info updated!!');
    }
    public function SidebarAdvertisementDelete($id)
    {
        $data = SidebarAdvertisement::findOrFail($id);
        unlink(public_path('uploads/'.$data->sidebar_ad));
        $data->delete();
        return redirect()->back()->with('success','Sidebar Ad Deleted!!');
    }


}
