<?php

namespace App\Notifications;

abstract class Notification
{
    public $image_url;
    public $action_app;
    public $action_web;
    public $status;
    public $type;
    public $receiver;
    public $actor;

    public const UNSEEN = "unseen";
    public const SEEN = "seen";
    public const CLICKED = "clicked";

    /**
     * Notification constructor.
     * @param $image_url
     * @param $action_app
     * @param $action_web
     * @param $status
     * @param $type
     * @param $receiver_id
     * @param $author_id
     */
    public function __construct($image_url, $action_app, $action_web, $status, $type, $receiver, $actor)
    {
        $this->image_url = $image_url;
        $this->action_app = $action_app;
        $this->action_web = $action_web;
        $this->status = $status;
        $this->type = $type;
        $this->receiver = $receiver;
        $this->actor = $actor;
    }


    public static function saveNotification(Notification $notification)
    {
        $newNotification = new \App\Notification();
        $newNotification->detail = $notification->format();
        $newNotification->image_url = $notification->image_url;

        $newNotification->action_app = $notification->action_app;
        $newNotification->action_web = $notification->action_web;

        $newNotification->status = $notification->status;
        $newNotification->type = $notification->type;
        $newNotification->receiver_id = $notification->receiver->id;
        $newNotification->actor_id = $notification->actor->id;
        $newNotification->save();
    }

    abstract public function format();
}
