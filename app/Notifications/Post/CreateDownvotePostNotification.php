<?php

namespace App\Notifications\Post;


class CreateDownvotePostNotification extends UpvotePostNotification
{
    public function __construct($actor, $post)
    {
        parent::__construct($actor, $post);
    }

    function getType()
    {
        return "post.vote.down.create";
    }
}
