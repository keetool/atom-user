<?php

namespace App\Http\Resources;

class PostFullResource extends Post
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data["body"] = $this->body;
        return $data;
    }
}
