<?php
namespace App\Repositories;

use App\Language;

class LanguageRepository extends Repository {

    public function __construct(){
        parent::__construct(new Language());
    }

}
