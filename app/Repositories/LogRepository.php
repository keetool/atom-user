<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Log;

class LogRepository extends Repository {

    public function __construct(){
        parent::__construct(new Log());
    }
}
