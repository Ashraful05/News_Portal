<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\NewsPosts;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function NewsDetails($id)
    {
        $tags = Tag::where('post_id',$id)->get();
        $newsDetail = NewsPosts::with('rSubCategory')->where('id',$id)->first();
        if($newsDetail->author_id == 0)
        {
            $userData = Admin::where('id',$newsDetail->admin_id)->first();
//            $userData->name;
        }else{

        }
        // update page view count...
        $newVisitor = $newsDetail->visitors+1;
        $newsDetail->visitors = $newVisitor;
        $newsDetail->update();

        $relatedPostArray = NewsPosts::orderby('id','desc')->where('sub_category_id',$newsDetail->sub_category_id)->get();
//        foreach ($relatedPostArray as $data){
//            echo $data->post_title.'<br>';
//        }

        return view('frontend.news_detail',compact('newsDetail','userData','tags','relatedPostArray'));
    }
}
