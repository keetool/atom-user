<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";
}
