<?php

namespace App;


class ImagePost extends UuidModel
{
    protected $table = 'image_post';

    protected $fillable = ["image_id", "post_id"];
}
