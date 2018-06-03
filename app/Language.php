<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";
}
