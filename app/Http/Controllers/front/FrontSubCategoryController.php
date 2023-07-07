<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\NewsPosts;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontSubCategoryController extends Controller
{
    public function index($id)
    {
        $subCategoryData = SubCategory::where('id',$id)->first();
        $postData = NewsPosts::where('sub_category_id',$id)->orderby('id','desc')->paginate(4);
//        return $subCategoryData;
        return view('frontend.sub_category',compact('subCategoryData','postData'));
    }
}
