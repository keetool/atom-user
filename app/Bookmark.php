<?php

namespace App;


class Bookmark extends UuidModel
{
    protected $table = "bookmarks";

    protected $fillable = [
        "user_id", "post_id"
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }
}
