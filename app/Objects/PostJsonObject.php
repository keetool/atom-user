<?php
namespace App\Objects;


class PostJsonObject extends JsonObject
{
    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }
    public function toArray() {
        return [
            'type' => 'post',
            'data' => [
                "post_id" => $this->post->id,
            ]
        ];
    }
}
