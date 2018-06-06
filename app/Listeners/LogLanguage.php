<?php

namespace App\Listeners;

use App\Events\OnLanguage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Log;

class LogLanguage
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
     * @param  OnLanguage  $event
     * @return void
     */
    public function handle(OnLanguage $event)
    {
        $log = new Log();
        $log->action = $event->action;
        $log->api = ' ';
        $log->user_id = $event->user->id;
        $text = [
            [
                "type" => "key",
                "value" => "log.language." . $event->action,
            ],
            [
                "type" => "user",
                "value" => $event->user->id,
            ],
            [
                "type" => "language",
                "value" => $event->language->id,
            ],
        ];
        $log->log = json_encode($text);
        $log->save();
    }
}
