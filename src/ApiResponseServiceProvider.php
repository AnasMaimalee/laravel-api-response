<?php

namespace Maimalee\LaravelApiResponse;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Maimalee\LaravelApiResponse\Exceptions\ApiException;

class ApiResponseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/api-response.php',
            'api-response'
        );

        $this->app->singleton(ApiResponse::class, function () {
            return new ApiResponse();
        });
    }

    
    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/api-response.php' => config_path('api-response.php'),
        ], 'config');

        // Handle ApiException globally
        app(ExceptionHandler::class)->renderable(function (ApiException $e) {
            return api()->error(
                $e->getMessage(),
                $e->getStatus(),
                $e->getErrors()
            );
        });
    }
}
