<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->user_id,
            'category_id'=>$this->category_id,
            'content'=>$this->content,
            'date_of_writing'=> $this->date_of_writing,
            'days_off'=>$this->days_off,
            'description'=>$this->description,
        ];
    }
}