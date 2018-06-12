<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;


class Log extends Resource
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
            "id" => $this->id,
            "action" => $this->action,
            "api" => $this->api,
            "user_id" => $this->user_id,
            "created_at" => strtotime($this->created_at),
            "updated_at" => strtotime($this->updated_at)
        ];
    }
}
