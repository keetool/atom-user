<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends UuidModel
{
    protected $table = 'posts';

    protected $fillable = ["user_id", "merchant_id", "path", 'url'];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, "merchant_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, "post_id");
    }
}
