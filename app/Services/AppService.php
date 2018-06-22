<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Logs\Log;
use App\Logs\SignInLog;
use App\User;

class AppService
{
    public function signIn($request, $email, $password) 
    {
        $user = User::where('email', $email)->first();
        $http = new Client;
        $response = $http->post(config("app.protocol") . config("app.domain") . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => config("app.client_id"),
                'client_secret' => config("app.client_secret"),
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ]
        ]);

        $signInLog = new SignInLog($user, "manage.user.signin", $request->url(), $request->header('User-Agent'));
        Log::sendLog($signInLog);

        return json_decode((string)$response->getBody(), true);
    }
}
