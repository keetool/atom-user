<?php

namespace App;

class MerchantUser extends UuidPivotModel
{
    protected $table = "merchant_user";
    protected $fillable = [
        "role", "merchant_id", "user_id"
    ];
}
