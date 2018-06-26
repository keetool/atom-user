<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends UuidModel
{
    protected $table = 'merchants';

    protected $fillable = [
        "name", "sub_domain"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'merchant_user', 'merchant_id', 'user_id')
            ->withPivot('id', 'role')->withTimestamps();
    }

    public function posts() {
        return $this->hasMany(Post::class, "merchant_id");
    }
}
