<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends UuidModel
{
    protected $table = 'comments';

    protected $fillable = ["value", "post_id", "user_id", "upvote", "downvote"];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where('comments.hide', '=', null);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }

    public function votes()
    {
        return $this->hasMany(CommentVote::class, "comment_id");
    }
}
