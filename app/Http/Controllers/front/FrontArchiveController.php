<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\NewsPosts;
use Illuminate\Http\Request;

class FrontArchiveController extends Controller
{
    public function showArchive(Request $request)
    {
        $temp_data = explode('-',$request->archive_month_year);
        $month = $temp_data[0];
        $year = $temp_data[1];
        return redirect()->route('archive_with_pagination',compact('month','year'));
//        return $month.'<br>'.$year;

    }
    public function showArchiveWithPagination($year,$month)
    {
        $postDataArchive = NewsPosts::whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->paginate(2);
        foreach ($postDataArchive as $item){
            $ts = strtotime($item->created_at);
            $updated_date = date('F,Y',$ts);
            break;
        }
        return view('frontend.archive_details',compact('postDataArchive','updated_date'));
    }
}
