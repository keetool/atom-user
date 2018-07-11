<?php

namespace App\Notifications\Post;

use App\Notifications\Notification;
use App\Objects\KeyJsonObject;
use App\Objects\PostJsonObject;
use App\Objects\UserJsonObject;

abstract class UpvotePostNotification extends Notification
{

    public $actor;
    public $post;

    public function __construct($actor, $post)
    {
        parent::__construct(
            $actor->avatar_url,
            $post->id,
            $post->id,
            Notification::UNSEEN,
            $this->getType(),
            $post->user,
            $actor);
        $this->post = $post;
    }

    public function format()
    {
        return json_encode([
            (new UserJsonObject($this->actor))->toArray(),
            (new PostJsonObject($this->post))->toArray()
        ]);
    }

    abstract function getType();
}
