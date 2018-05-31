<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Merchant;
use App\Repositories\MerchantRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    protected $merchantRepository;
    protected $userRepository;

    public function __construct(Merchant $merchant, User $user)
    {
        $this->merchantRepository = new MerchantRepository($merchant);
        $this->userRepository = new UserRepository($user);
    }

    /**
     * Create merchant and root user
     * @param [string] name
     * @param [string] email
     * @param [string] password
     * @param [string] password_confirmation
     * @param [string] sub_domain
     * @param [string] merchant_name
     * @param [bool] is_root
     * @param [string] password_confirmation
     * @return [string] message
     */
    public function merchantSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            "merchant_name" => "required|string",
            "sub_domain" => "required|string|unique:merchants"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return $this->badRequest($errors);
        }

        $merchant = $this->merchantRepository->create([
            "name" => $request->merchant_name,
            "sub_domain" => $request->sub_domain
        ]);


        $user = $this->userRepository->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "merchant_id" => $merchant->id,
            "is_root" => $request->is_root
        ]);

        return $this->resourceCreated([
            "message" => "Successfully created merchant and user"
        ]);
    }

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return $this->resourceCreated([
            "message" => "Successfully created user"
        ]);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
            'message' => 'Unauthorized'
        ], 401);
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
