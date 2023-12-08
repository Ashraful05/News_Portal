<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function rCategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function rPost()
    {
        return $this->hasMany(NewsPosts::class,'sub_category_id','id')->orderBy('id','desc');
    }
    public function rLanguage()
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }
}
