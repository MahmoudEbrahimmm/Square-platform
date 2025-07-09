<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        "id","cate_image","name_en","name_ar","email","password","about_en","about_ar"
    ];
}
