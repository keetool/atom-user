<?php
namespace App\Repositories;

use App\Keyword;

class KeywordRepository extends Repository {

    public function __construct(){
        parent::__construct(new Keyword());
    }

    public function findByName($name) {
        return Keyword::where("name", $name)->first();
    }

}
