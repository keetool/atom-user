<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $keywords = [];
        foreach ($this->keywords as $keyword) {
            $keywords[$keyword->name] = $keyword->pivot->content;
        }
        return [
            "id" => $this->id,
            "name" => $this->name,
            "client_code" => $this->client_code,
            "codes" => $this->codes,
            "keywords" => $keywords,
            "version" => $this->version
        ];
    }
}
