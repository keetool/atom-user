<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/6/18
 * Time: 9:06 AM
 */

namespace App\Services;


use App\SocketEvent\SocketEvent;

interface SocketServiceInterface
{
    public function publish($channel, $event, $data);

    public function publishEvent($channel, SocketEvent $socketEvent);
}