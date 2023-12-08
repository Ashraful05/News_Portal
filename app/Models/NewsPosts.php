<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPosts extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function rSubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
    public function rLanguage()
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }


}
