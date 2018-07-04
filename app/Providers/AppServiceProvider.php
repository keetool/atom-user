<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepository;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketService;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use App\Repositories\CommentVoteRepository;
use App\Repositories\CommentVoteRepositoryInterface;

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

        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);

        $this->app->singleton(SocketService::class, SocketService::class);

        $this->app->singleton(ImageRepositoryInterface::class, ImageRepository::class);

        $this->app->singleton(CommentVoteRepositoryInterface::class, CommentVoteRepository::class);
    }

}
