<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends UuidModel
{

    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = ["value", "post_id", "user_id"];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function post() {
        return $this->belongsTo(Post::class, "post_id");
    }
}
