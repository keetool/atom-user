<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UuidPivotModel extends Pivot
{
    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";
}
