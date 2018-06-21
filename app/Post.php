<?php

namespace App;

class Post extends UuidModel
{
    protected $table = 'posts';

    protected $fillable = ["title", "body", "upvote", "downvote", "merchant_id", "creator_id"];

    public function merchant() {
        return $this->belongsTo(Merchant::class, "merchant_id");
    }

    public function user() {
        return $this->belongsTo(User::class, "creator_id");
    }
}
