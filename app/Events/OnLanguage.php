<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;
use App\Language;

class OnLanguage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $language;
    public $user;
    public $action;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Language $language, User $user, $action)
    {
        $this->language = $language;
        $this->user = $user;
        $this->action = $action;
    }
}
