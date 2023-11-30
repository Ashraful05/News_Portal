<?php

namespace App\Http\Controllers\front;

use app\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontVideoController extends Controller
{
    public function videoGallery()
    {
        Helpers::read_json();
        $videos = Video::paginate(4);
        return view('frontend.video_gallery',compact('videos'));
    }
}
