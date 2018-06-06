<?php

namespace App;

class KeywordLanguage extends UuidPivotModel
{
    protected $table = "keyword_language";
    protected $fillable = [
        "content", "language_id", "keyword_id"
    ];
}
