<?php

namespace App\Providers;

use App\Repositories\BookmarkRepository;
use App\Repositories\BookmarkRepositoryInterface;
use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ImagePostRepository;
use App\Repositories\ImagePostRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\MerchantInterface;
use App\Repositories\MerchantRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\NotificationRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepository;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketService;
use App\Services\SocketServiceInterface;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use App\Repositories\CommentVoteRepository;
use App\Repositories\CommentVoteRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

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

        $this->app->singleton(SocketServiceInterface::class, SocketService::class);

        $this->app->singleton(ImageRepositoryInterface::class, ImageRepository::class);

        $this->app->singleton(CommentVoteRepositoryInterface::class, CommentVoteRepository::class);

        $this->app->singleton(MerchantInterface::class, MerchantRepository::class);

        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(ImagePostRepositoryInterface::class, ImagePostRepository::class);

        $this->app->singleton(NotificationRepositoryInterface::class, NotificationRepository::class);

        $this->app->singleton(BookmarkRepositoryInterface::class, BookmarkRepository::class);
    }

}
