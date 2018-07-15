<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository implements UserRepositoryInterface
{
    protected $merchantRepository;

    public function __construct(MerchantRepository $merchantRepository)
    {
        parent::__construct(new User());
        $this->merchantRepository = $merchantRepository;
    }

    public function joinMerchantUser()
    {
        return $this->model->join("merchant_user", "users.id", "=", "merchant_user.user_id");
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
        $user = $this->joinMerchantUser()
            ->where("merchant_user.merchant_id", $merchant->id)->where("email", $email)->first();
        return $user != null;
    }

    /**
     * Find a user with merchant id email and password
     * @param [string] $merchant_id
     * @param [string] $email
     * @param [string] $password
     * @return [user] $user
     */
    public function findUserByMerchantEmailPassword($merchant_id, $email, $password)
    {
        $user = $this->joinMerchantUser()
            ->where("users.email", "=", $email)
            ->where("merchant_user.merchant_id", "=", $merchant_id)
            ->select("users.*")
            ->first();

        if ($user != null && Hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }

    public function findNewUserByMerchant($subDomain, $limit = 10)
    {
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);

        if (!$merchant) {
            return false;
        }


        // $users = $this->model->leftJoin('posts', 'posts.creator_id', '=', 'users.id')->leftJoin('comments', 'comments.post_id', '=', 'posts.id')
        //     ->where('posts.merchant_id', $merchant->id)
        //     ->groupBy('users.id')
        //     ->select('users.*', DB::raw('sum(posts.upvote) + sum(comments.upvote) + sum(posts.downvote) + sum(comments.downvote) as votes_count')
        //         , DB::raw('count(posts.*) as posts_count'), DB::raw('count(comments.*) as comments_count'))
        //     ->get();
        // dd($users);
        $users = $this->joinMerchantUser()
            ->where("merchant_user.merchant_id", $merchant->id)->orderBy("merchant_user.created_at", "desc")->paginate($limit);
        return $users;
    }

    /**
     * Check if user exists
     * @param [string] $username
     * @return [bool] userExist
     */
    public function uniqueUserByUsername($username)
    {
        $user = Auth::user();

        $userExist = User::where('username', $username)->where('id', '<>', $user->id)->first();

        return $userExist != null;

    }
}
