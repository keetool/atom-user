<?php

namespace App\Notifications;

use App\Objects\KeyJsonObject;
use App\Objects\PostJsonObject;
use App\Objects\UserJsonObject;

class CreateCommentNotification extends Notification
{
    protected $title;
    protected $detail;
    protected $image_url;
    protected $action_app;
    protected $action_web;
    protected $status;
    protected $user;
    protected $post;

    public function __construct(
        $user,
        $title, $detail,
        $post,
        $image_url,
        $action_app, $action_web, $status)
    {
        $this->user = $user;
        $this->title = $title;
        $this->detail = $detail;
        $this->image_url = $image_url;
        $this->action_app = $action_app;
        $this->action_web = $action_web;
        $this->status = $status;
        $this->post = $post;
    }

    protected function format()
    {
        return json_encode([
            (new UserJsonObject($this->user))->toArray(),
            (new KeyJsonObject("comment.create"))->toArray(),
            (new PostJsonObject($this->post))->toArray()
        ]);
    }
}
