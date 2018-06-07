<?php
namespace App\Logs;

use App\Repositories\LogRepository;

abstract class Log
{
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