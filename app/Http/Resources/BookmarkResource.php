<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "post" => new PostFullResource($this->post),
            "updated_at" => strtotime($this->updated_at),
            "created_at" => strtotime($this->created_at)
        ];
    }
}
