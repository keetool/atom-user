<?php
namespace App\Formater;

use App\Http\Resources\Post as PostResource;
use App\Post;


class PostFormater extends Formater
{
    public function format() {
        if (array_key_exists("post_id", $this->data)){
            $post = Post::find($this->data['post_id']);
        }
        if ($post == null) {
            return [];
        }
        return [
            "type" => "post",
            "data" => new PostResource($post)
        ];
    }
}
