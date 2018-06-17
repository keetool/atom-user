<?php

namespace App;


class Action extends UuidModel
{
    protected $table = "actions";

    protected $fillable = ['name', 'keyword', 'permission', 'type'];
}
