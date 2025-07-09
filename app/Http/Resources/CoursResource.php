<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoursResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"=>$this->id, 
            "cate_image"=>$this->cate_image,  
            "title_en"=>$this->title_en, 
            "description_en"=>$this->description_en, 
            "price"=>$this->price, 
            "parent_id"=>$this->parent_id, 
        ];
    }
}
