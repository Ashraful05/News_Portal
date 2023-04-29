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
}
