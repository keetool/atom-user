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
        $data =  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'avatar_url' => $this->avatar_url,
            "is_root" => $this->is_root,
            "lang_encode" => $this->lang_encode,
            'created_at' => strtotime($this->created_at),
            'updated_at' => strtotime($this->updated_at),
        ];
        if(isset($this->posts_count))
            $data['posts_count'] = $this->posts_count;
        if(isset($this->comments_count))
            $data['comments_count'] = $this->comments_count;
        if(isset($this->votes_count))
            $data['votes_count'] = $this->votes_count;
        if(isset($this->joined))
            $data['joined'] = $this->joined;
        return $data;
    }
}
