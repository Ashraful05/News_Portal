<?php

namespace App\Http\Controllers\front;

use app\Helper\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontLanguageController extends Controller
{
    public function frontLanguageSwitch(Request $request)
    {
//        return $request->language_short_name;
        Helpers::read_json();
        session()->put('session_short_name',$request->language_short_name);
        return redirect()->back();
    }
}
