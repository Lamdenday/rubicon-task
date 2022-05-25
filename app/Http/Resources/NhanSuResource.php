<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NhanSuResource extends JsonResource
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
            'id' => $this->id,
            'name'=> User::find($this->user_id)->name,
            'Email'=>User::find($this->user_id)->email,
            'level'=>$this->level,
            'DOB' =>$this->DOB,
            'Image' =>$this->image,
            'status' =>$this->status,
        ];
    }
}
