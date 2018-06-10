<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Merchant;
use App\MerchantUser;

class MerchantRepository extends Repository {

    public function __construct(){
        parent::__construct(new Merchant());
    }

    /**
     * @param [string] $subDomain
     * @return [Merchant] $merchant
     */
    public function findBySubDomain($subDomain){
        return $this->model->where("sub_domain", $subDomain)->first();
    }


}
