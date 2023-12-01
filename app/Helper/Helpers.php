<?php

namespace App\Helper;


use Illuminate\Http\Request;
use App\Models\Language;

use File;



class Helpers{

    public static function read_json(){
        if(!session()->get('session_short_name')){
            $default_language_data = Language::where('is_default','yes')->first();
            $current_short_name = $default_language_data->language_short_name;
        }
        else{
            $current_short_name = session()->get('session_short_name');
        }
        $jsonData = json_decode(file_get_contents(resource_path('languages/'.$current_short_name.'.json')));
        foreach ($jsonData as $key=>$value){
            define($key,$value);
        }

    }
}
