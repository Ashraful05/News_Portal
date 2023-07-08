<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class FrontPhotoController extends Controller
{
    public function photoGallery()
    {
        $photos = Photo::paginate(8);
        return view('frontend.photo_gallery',compact('photos'));
    }
}
