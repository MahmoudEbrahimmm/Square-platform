<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"=>$this->id, 
            "cate_image"=>$this->imageName ,   
            "title_en"=>$this->title_en, 
            "description_en"=>$this->description_en, 
            "link"=>$this->link, 
        ];
    }
}
