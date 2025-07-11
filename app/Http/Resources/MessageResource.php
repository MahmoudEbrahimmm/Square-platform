<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            "id"=>$this->id, 
            "email"=>$this->email,  
            "message_en"=>$this->message_en, 
        ];
    }
}
