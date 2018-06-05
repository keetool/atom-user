<?php

namespace App;

class Language extends UuidModel
{
    protected $fillable = ["name", "codes"];

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword')->withPivot("content")->withTimestamps();
    }
}
