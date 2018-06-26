<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Merchant extends JsonResource
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
            'sub_domain' => $this->sub_domain,
            'created_at' => strtotime($this->created_at),
            'updated_at' => strtotime($this->updated_at),
        ];
    }
}
