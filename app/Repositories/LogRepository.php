<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Log;

class LogRepository extends Repository {

    public function __construct(){
        parent::__construct(new Log());
    }

    /**
     * Find logs by user id
     * @param [uuid] userId
     * @return [paginator] logs
     */
    public function findLogsByUserId($userId, $limit = 20, $order = "desc") {
        return $this->model->where("user_id", $userId)->orderBy("created_at", $order)->paginate($limit);
    }
}
