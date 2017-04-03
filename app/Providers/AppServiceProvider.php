<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function( array $data = [], $msg = 'success', $errorCode = 200)
        {
            return response()->json([
                'data' => $data,
                'message' => $msg,
                'code' => $errorCode
            ]);
        });

        Response::macro('error', function($msg = 'error', $errorCode = -1)
        {
            return response()->json([
                'message' => $msg,
                'code' => $errorCode
            ]);
        });

        // Validator::extend('login', 'FooValidator@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);
    }
}
