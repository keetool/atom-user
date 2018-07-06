<?php

namespace App;

class Vote extends UuidModel
{

    protected $table = 'votes';

    protected $fillable = ["user_id", "value", "post_id"];

}
