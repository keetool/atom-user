<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UuidPivotModel extends Model
{
    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";
}
