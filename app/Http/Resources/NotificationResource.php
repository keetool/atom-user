<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            "detail" => $this->detail,
            'action_app' => $this->action_app,
            "action_web" => $this->action_web,
            "type" => $this->type,
            "image_url" => $this->image_url,
            "status" => $this->status,
            "receiver" => new User($this->receiver),
            "actor" => new User($this->actor),
            "updated_at" => strtotime($this->updated_at),
            "created_at" => strtotime($this->created_at)
        ];
    }
}
