<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\t$this  $this
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id, 
            "cate_image"=>$this->imageName ,  
            "name_en"=>$this->name_en,  
            "email"=>$this->email,  
            "about_en"=>$this->about_en,  
        ];
    }
}
