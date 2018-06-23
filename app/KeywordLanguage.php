<?php

namespace App;

class KeywordLanguage extends UuidPivotModel
{
    protected $table = "keyword_language";
    protected $fillable = [
        "content", "language_id", "keyword_id"
    ];

    public function toArray()
    {
        return [
            "keyword_id" => $this->keyword_id,
            "language_id" => $this->language_id,
            "content" => $this->content,
        ];
    }
}
