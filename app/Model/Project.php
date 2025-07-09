<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "id","cate_image","title_en","title_ar","description_en","description_ar","link"
    ];
}
