<?php

namespace App\Listeners;

use App\Events\SignUpMerchant;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Log;

class LogSignUpMerchant
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
     * @param  SignUpMerchant  $event
     * @return void
     */
    public function handle(SignUpMerchant $event)
    {
        $log = new Log();
        $log->action = 'sign-up';
        $log->api = ' ';
        $log->user_id = $event->user->id;
        $log->log = 'sign up merchant';
        $log->save();
    }
}
