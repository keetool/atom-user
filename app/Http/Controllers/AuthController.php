<?php

namespace App\Http\Controllers;

use App\Logs\CreateMerchantLogFactory;
use App\Logs\SignInLogFactory;
use App\Services\AppService;
use Illuminate\Http\Request;
use App\Repositories\MerchantRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use App\Logs\Log;
use App\Repositories\MerchantUserRepository;
use GuzzleHttp\Exception\GuzzleException;
use App\Merchant;

/**
 * @resource Auth
 */
class AuthController extends ApiController
{
    protected $merchantRepository;
    protected $userRepository;
    protected $merchantUserRepository;
    protected $appService;

    public function __construct(
        MerchantUserRepository $merchantUserRepository,
        MerchantRepository $merchantRepository,
        UserRepository $userRepository,
        AppService $appService
    ) {
        $this->merchantRepository = $merchantRepository;
        $this->userRepository = $userRepository;
        $this->merchantUserRepository = $merchantUserRepository;
        $this->appService = $appService;
    }

    /**
     *
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
        // change validation messages
        $messages = [
            'name.required' => lang_key_to_text("form.error.name.required"),
            'phone.required' => lang_key_to_text("form.error.phone.required"),
            'email.required' => lang_key_to_text("form.error.email.required"),
            'password.required' => lang_key_to_text("form.error.password.required"),
            'password.confirmed' => lang_key_to_text("form.error.password.confirmed"),
            'merchant_name.required' => lang_key_to_text("form.error.merchant_name.required"),
            'sub_domain.required' => lang_key_to_text("form.error.sub_domain.required"),
            'password_confirmation.required' => lang_key_to_text("form.error.password_confirmation.required"),
            'password.regex' => lang_key_to_text("form.error.password.regex"),
            'password.min' => lang_key_to_text("form.error.password.min"),
        ];

        // change validation rules
        $rules = [
            'name' => 'required|string',
            'phone' => "required|string",
            'email' => 'required|string|email',
            'password' => array('required', 'string', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/'),
            "merchant_name" => "required|string",
            "password_confirmation" => "required|string",
            "sub_domain" => "required|string|unique:merchants"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // return errors to user
            $errors = $validator->errors()->all();
            return $this->badRequest($errors);
        }

        $subDomain = $request->sub_domain;
        $email = $request->email;

        // check if user exist in merchant
        $userExist = $this->userRepository->uniqueUserMerchant($subDomain, $email);
        if ($userExist) {
            return $this->badRequest([
                "Email này đã tồn tại"
            ]);
        }

        // create merchant
        $merchant = $this->merchantRepository->create([
            "name" => $request->merchant_name,
            "sub_domain" => $subDomain
        ]);

        // create user belongs to merchant
        $user = $this->userRepository->create([
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $email,
            "password" => bcrypt($request->password),
            "is_root" => true
        ]);

        // add user to merchant
        $this->merchantUserRepository->createMerchantUser($merchant->id, $user->id, "root");
        
        // log create merchant
        $createMerchantLogFactory = new CreateMerchantLogFactory($request->url(), $user, $merchant);
        Log::sendLog($createMerchantLogFactory->makeLog());

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

    public function signin(Request $request)
    {
        // get subdomain from middleware
        $subDomain = $request->subDomain;
        $email = $request->email;
        $password = $request->password;

        // get merchant from subdomain
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);

        if ($merchant == null) {
            return $this->badRequest([
                "message" => "domain không tồn tại"
            ]);
        }

        // get user by merchant, email and password
        $user = $this->userRepository->findUserByMerchantEmailPassword($merchant->id, $email, $password);

        // if user not found
        if ($user == null) {
            return $this->badRequest([
                "message" => "Sai thông tin đăng nhập"
            ]);
        }

        return $this->appService->signIn($request, $email, $password);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function refreshToken(Request $request)
    {
        $refresh_token = $request->refresh_token;

        $http = new Client;

        $response = null;

        try {
            $response = $http->post(config("app.protocol") . config("app.domain") . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'client_id' => config("app.client_id"),
                    'client_secret' => config("app.client_secret"),
                    'scope' => '*',
                ],
            ]);
        } catch (GuzzleException $e) {
            return $this->respond([
                "message" => "Invalid token"
            ], "401");
        }


        return json_decode((string)$response->getBody(), true);

    }

    /**
     * Check if merchant exist
     *
     */
    public function checkMerchant(Request $request)
    {
        $messages = [
            'sub_domain.required' => lang_key_to_text("form.error.sub_domain.required"),
            'sub_domain.exists' => lang_key_to_text("form.error.sub_domain.exists")
        ];

        // change validation rules
        $rules = [
            "sub_domain" => "required|string|exists:merchants,sub_domain"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // return errors to user
            $errors = $validator->errors()->all();
            return $this->badRequest($errors);
        }
        return $this->resourceCreated([
            "message" => "Reroute you to your sub domain in a sec"
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

    public function facebookTokenSignin(Request $request)
    {
        $inputToken = $request->input_token;
        $data = $request->data;
        $facebookId = $request->facebook_id;
        $subDomain = $request->subDomain;
        $merchant = Merchant::where('sub_domain', $subDomain)->first();
        // dd($subDomain);
        if ($merchant == null)
            return $this->badRequest('Non-existing merchant');
        // dd($subDomain);
        $http = new Client;

        $response = $http->get("https://graph.facebook.com/oauth/access_token?client_id=" . config("app.facebook_app_id") . "&client_secret=" . config("app.facebook_app_secret") . "&grant_type=client_credentials");
        $response = json_decode((string)$response->getBody());
        $accessToken = $response->access_token;

        $response = $http->get("https://graph.facebook.com/debug_token?input_token=" . $inputToken . "&access_token=" . $accessToken);
        $response = json_decode((string)$response->getBody());
        if ($response->data) {
            //id + name + email
            $response = $http->get("https://graph.facebook.com/me?fields=id,name,email&access_token=" . $inputToken);
            $response = json_decode((string)$response->getBody());
            // dd($response);
            $user = User::where("social_id", "facebook." . $facebookId)->first();
            if ($user == null) {
                $user = new User();
                if (isset($response->email))
                    $user->email = $response->email;
                else
                    $user->email = "facebook" . $response->id . '@atomuser.com';
                $user->social_id = "facebook." . $facebookId;
                $user->password = bcrypt($user->social_id);
                $user->phone = '000';
            }

            $user->name = $response->name;


//            $data = file_get_contents("https://graph.facebook.com/" . $facebookId . "/picture?&type=large&access_token=" . $inputToken);
//            $fileName = 'fb_profilepic.jpg';
//            $file = fopen($fileName, 'w+');
//            fputs($file, $data);
//            fclose($file);

            //avatar
            $response = $http->get("https://graph.facebook.com/" . $facebookId . "/picture?redirect=0&type=large");
            $response = json_decode((string)$response->getBody())->data;

            // $user->avatar_url = "https://graph.facebook.com/" . $facebookId . "/picture?type=large";
            $user->avatar_url = $response->url;
            $user->save();

            $this->merchantUserRepository->createMerchantUser($merchant->id, $user->id, "student");

            return $this->appService->signIn($request, $user->email, $user->social_id);
        } else {
            return $this->badRequest();
        }
    }

    public function googleTokenSignin(Request $request)
    {
        $inputToken = $request->input_token;

        $subDomain = $request->subDomain;
        $merchant = Merchant::where('sub_domain', $subDomain)->first();
        if ($merchant == null)
            return $this->badRequest('Non-existing merchant');

        $http = new Client;
        $response = $http->get("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $inputToken);
        $response = json_decode((string)$response->getBody());

        // dd($response);
        $user = User::where("social_id", "google." . $response->sub)->first();
        if ($user == null) {
            $user = new User();
            if (isset($response->email))
                $user->email = $response->email;
            else
                $user->email = $response->sub . '@atomuser.com';
            $user->social_id = "google." . $response->sub;
            $user->password = bcrypt($user->social_id);
            $user->phone = '000';
        }
        $user->name = $response->name;
        $user->avatar_url = $response->picture;
        $user->save();

        $this->merchantUserRepository->createMerchantUser($merchant->id, $user->id, "student");

        return $this->appService->signIn($request, $user->email, $user->social_id);
    }

    public function test(Request $request)
    {
        dd($request->subDomain);
    }
}
