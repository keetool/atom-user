<?php

namespace App;

class Post extends UuidModel
{
    protected $table = 'posts';

    protected $fillable = ["title", "body", "upvote", "downvote", "merchant_id", "creator_id"];

}
