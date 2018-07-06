<?php

namespace App;


class Notification extends UuidModel
{
    protected $table = "notifications";

    protected $fillable = ['detail',
        'action_app',
        'action_web',
        'status',
        'title',
        'type',
        'receiver_id',
        'author_id',
        'image_url', 'type'];

    public function receiver()
    {
        return $this->belongsTo(User::class, "receiver_id");
    }

    public function actor()
    {
        return $this->belongsTo(User::class, "actor_id");
    }
}
