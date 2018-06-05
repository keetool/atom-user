<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UuidModel extends Model
{
    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";
}
