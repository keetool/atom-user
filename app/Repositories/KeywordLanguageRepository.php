<?php
namespace App\Repositories;

use App\KeywordLanguage;

class KeywordLanguageRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new KeywordLanguage());
    }

    public function findByKeywordIdAndLanguageId($keywordId, $languageId)
    {
        return $this->model->where("language_id", $languageId)->where("keyword_id", $keywordId)->first();
    }


}
