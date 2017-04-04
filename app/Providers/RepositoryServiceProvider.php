<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Repository\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\PostRepository::class, \App\Repositories\Eloquent\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\CommentRepository::class, \App\Repositories\Eloquent\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\StarRepository::class, \App\Repositories\Eloquent\StarRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\BrowsevolmeRepository::class, \App\Repositories\Eloquent\BrowsevolmeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Repository\CollectionsRepository::class, \App\Repositories\Eloquent\CollectionsRepositoryEloquent::class);
        //:end-bindings:
    }
}
