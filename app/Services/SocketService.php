<?php

namespace App\Services;

use App\SocketEvent\SocketEvent;
use Illuminate\Support\Facades\Redis;

class SocketService
{
    public function publish($channel, $event, $data)
    {
        $redis = Redis::connection();
        $data = [
            "data" => $data,
            "event" => $event
        ];
        $redis->publish($channel, json_encode($data));
    }

    public function publishEvent($channel, SocketEvent $socketEvent)
    {
        $this->publish($channel, $socketEvent->getName(), $socketEvent->getData());
    }
}
