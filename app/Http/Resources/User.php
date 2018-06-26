<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            "is_root" => $this->is_root,
            "lang_encode" => $this->lang_encode,
            'created_at' => strtotime($this->created_at),
            'updated_at' => strtotime($this->updated_at),
        ];
    }
}
