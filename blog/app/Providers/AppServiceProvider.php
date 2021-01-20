<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\BlogService;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\Impl\AuthServiceImpl;
use App\Services\Impl\BlogServiceImpl;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\CommentServiceImpl;
use App\Services\Impl\TagServiceImpl;
use App\Services\TagService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthServiceImpl();
        });
        $this->app->bind(BlogService::class, function ($app) {
            return new BlogServiceImpl();
        });
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryServiceImpl();
        });
        $this->app->bind(TagService::class, function ($app) {
            return new TagServiceImpl();
        });
        $this->app->bind(CommentService::class, function ($app) {
            return new CommentServiceImpl();
        });
    }
}
