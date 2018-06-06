<?php

namespace App\Listeners;

use App\Events\OnMerchant;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Log;

class LogMerchant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OnMerchant  $event
     * @return void
     */
    public function handle(OnMerchant $event)
    {
        $log = new Log();
        $log->action = $event->action;
        $log->api = ' ';
        $log->user_id = $event->user->id;
        $text = [
            [
                "type" => "key",
                "value" => "log.merchant." . $event->action,
            ],
            [
                "type" => "user",
                "value" => $event->user->id,
            ],
            [
                "type" => "merchant",
                "value" => $event->merchant->id,
            ],
        ];
        $log->log = json_encode($text);
        $log->save();
    }
}
