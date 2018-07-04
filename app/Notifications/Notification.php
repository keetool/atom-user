<?php

namespace App\Notifications;

abstract class Notification
{
    protected $title;
    protected $detail;
    protected $image_url;
    protected $action_app;
    protected $action_web;
    protected $status;


    public function __construct($title, $detail, $image_url, $action_app, $action_web, $status)
    {
        $this->title = $title;
        $this->detail = $detail;
        $this->image_url = $image_url;
        $this->action_app = $action_app;
        $this->action_web = $action_web;
        $this->status = $status;
    }

    public static function createNotification($notification) {
        $newNotification = new \App\Notification();
        $newNotification->detail = $notification->detail;
        $newNotification->action_app = $notification->detail;
        $newNotification->action_web = $notification->detail;
        $newNotification->status = $notification->detail;
        $newNotification->title = $notification->detail;
        $newNotification->image_url = $notification->detail;

    }


    abstract protected function format();
}
