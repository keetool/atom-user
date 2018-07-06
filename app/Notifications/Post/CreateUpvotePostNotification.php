<?php

namespace App\Notifications\Post;


class CreateUpvotePostNotification extends UpvotePostNotification
{
    public function __construct($actor, $post)
    {
        parent::__construct($actor, $post);
    }

    function getType()
    {
        return "post.vote.up.create";
    }
}
