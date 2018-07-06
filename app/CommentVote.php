<?php

namespace App;

class CommentVote extends UuidModel
{
    protected $table = 'comment_votes';

    protected $fillable = ["user_id", "value", "comment_id"];
}
