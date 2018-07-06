<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/2/18
 * Time: 9:27 AM
 */

namespace App\SocketEvent\Notification;

use App\SocketEvent\SocketEvent;

class CreateNotificationSocketEvent extends SocketEvent
{
    protected $data;

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function getName()
    {
        return "notification.create";
    }
}