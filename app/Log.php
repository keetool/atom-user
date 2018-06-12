<?php

namespace App;

class Log extends UuidModel
{
    protected $table = 'logs';

    protected $fillable = ["action", "api", "log", "user_id"];

}
