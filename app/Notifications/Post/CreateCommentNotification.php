<?php

namespace App\Notifications\Post;


class CreateCommentNotification extends CommentNotification
{
    public function __construct($actor, $post)
    {
        parent::__construct($actor, $post);
    }

    function getType()
    {
        return "post.comment.create";
    }
}
