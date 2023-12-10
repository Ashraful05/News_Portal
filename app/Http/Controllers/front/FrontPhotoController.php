<?php

namespace App\Http\Controllers\front;

use app\Helper\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Photo;
use Illuminate\Http\Request;

class FrontPhotoController extends Controller
{
    public function photoGallery()
    {
        Helpers::read_json();
        if(!session()->get('session_short_name')){
            $current_short_name = Language::where('is_default','yes')->first()->language_short_name;
        }else{
            $current_short_name = session()->get('session_short_name');
        }

        $currentLanguageId = Language::where('language_short_name',$current_short_name)->first()->id;

        $photos = Photo::where('language_id',$currentLanguageId)->paginate(8);

        return view('frontend.photo_gallery',compact('photos'));
    }
}
