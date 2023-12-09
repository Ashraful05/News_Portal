<?php

namespace App\Http\Controllers\front;

use App\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeAdvertisement;
use App\Models\Language;
use App\Models\NewsPosts;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\SubCategory;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function FrontHome()
    {
        Helpers::read_json();

        if(!session()->get('session_short_name')){
            $current_short_name = Language::where('is_default','yes')->first()->language_short_name;
        }else{
            $current_short_name = session()->get('session_short_name');
        }

        $currentLanguageId = Language::where('language_short_name',$current_short_name)->first()->id;

        $homeData = HomeAdvertisement::where('id',1)->first();
        $settingData = Setting::where('id',1)->first();

        $postData = NewsPosts::with('rSubCategory')
                    ->orderBy('id','desc')
                    ->where('language_id',$currentLanguageId)
                    ->get();

        $subCategoryData = SubCategory::with('rPost')
                           ->orderBy('sub_category_order','asc')
                           ->where('show_on_home_page','show')
                           ->where('language_id',$currentLanguageId)
                           ->get();

        $homeVideo = Video::get();

        $categories = Category::orderby('category_order','asc')->where('language_id',$currentLanguageId)->get();

        return view('frontend.home',compact('homeData','settingData','postData','subCategoryData','homeVideo','categories'));
    }
    public function FrontAbout()
    {
        Helpers::read_json();
        return view('frontend.about');
    }
    public function subCategoryByCategoryWithAjax($id)
    {
        Helpers::read_json();
        $sub_category_data = SubCategory::where('category_id',$id)->get();
//        $response = '<option value="">Select SubCategory</option>';
        $response = '';
        foreach($sub_category_data as $item) {
            $response .= '<option value="'.$item->id.'">'.$item->sub_category_name.'</option>';
        }
        return response()->json(['sub_category_data' => $response]);
    }
    public function searchResult(Request $request)
    {
        Helpers::read_json();

        $postData = NewsPosts::with('rSubCategory')->orderby('id','desc');
        if($request->text_portion != ''){
            $postData = $postData->where('post_title','like','%'.$request->text_portion.'%');
        }
        if($request->sub_category != ''){
            $postData = $postData->where('sub_category_id',$request->sub_category);
        }
        $postData = $postData->paginate();
//        foreach ($postData as $data){
//            echo $data->post_title;
//        }
        return view('frontend.search_result',compact('postData'));
    }
}
