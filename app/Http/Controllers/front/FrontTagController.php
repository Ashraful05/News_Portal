<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\NewsPosts;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTagController extends Controller
{
    public function tagWisePost($tag_name)
    {
        $tagData = Tag::where('tag_name',$tag_name)->get();

        $all_post_ids = [];

        foreach ($tagData as $data){
            $all_post_ids[] = $data->post_id;
        }
//        return $all_post_ids;
        $postData = NewsPosts::orderBy('id','desc')->get();

        return view('frontend.tag_wise_post',compact('all_post_ids','postData','tag_name'));
    }
}
