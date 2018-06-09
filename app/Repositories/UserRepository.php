<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRepository extends Repository
{
    protected $merchantRepository;

    public function __construct(MerchantRepository $merchantRepository)
    {
        parent::__construct(new User());
        $this->merchantRepository = $merchantRepository;
    }

    /**
     * Check if user exists in merchant
     * @param [string] $merchantName
     * @param [string] $email
     * @return [bool] userExist
     */
    public function uniqueUserMerchant($subDomain, $email)
    {
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);
        if (!$merchant) {
            return false;
        }
        $user = $this->model->where("merchant_id", $merchant->id)->where("email", $email)->first();
        return $user != null;
    }

    /**
     * Find a user with merchant id email and password
     * @param [string] $merchant_id
     * @param [string] $email
     * @param [string] $password
     * @return [user] $user
     */
    public function findUserByMerchantEmailPassword($merchant_id, $email, $password){

    }
}
