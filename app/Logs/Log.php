<?php
namespace App\Logs;

use App\Repositories\LogRepository;

abstract class Log
{
    public $action;
    public $user;
    public $api;

    public function __construct($user, $action, $api)
    {
        $this->action = $action;
        $this->user = $user;
        $this->api = $api;
    }

    public static function sendLog($log)
    {
        $logRepository = new LogRepository();
        $logRepository->create([
            'action' => $log->action,
            'api' => $log->api,
            'log' => $log->format(),
            'user_id' => $log->user->id,
        ]);
    }

    abstract protected function format();
}
