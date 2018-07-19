<?php

namespace App;

class Post extends UuidModel
{
    protected $table = 'posts';

    protected $fillable = ['num_comments', "body", "upvote", "downvote", "merchant_id", "creator_id"];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('posts.hide', '=', null);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, "merchant_id");
    }

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, "post_id");
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, "post_id");
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, "image_post", "post_id", "image_id");
    }
}
