<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "value" => $this->value,
            'post_id' => $this->post_id,
            "user" => new User($this->user),
            "updated_at" => strtotime($this->updated_at),
            "created_at" => strtotime($this->created_at)
        ];
    }
}
