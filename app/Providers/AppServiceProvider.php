<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepository;
use App\Repositories\VoteRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use GuzzleHttp\Client;
use App\Log;
use App\Logs\SignInLog;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();

        $this->app->register(\Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class);

        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);

        $this->app->singleton(VoteRepositoryInterface::class, VoteRepository::class);
    }

    public function signIn($request, $facebook_id, $password)
    {
        $user = User::where('facebook_id', $facebook_id)->first();

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
