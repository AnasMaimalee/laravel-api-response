<?php

use Maimalee\LaravelApiResponse\ApiResponse;

if (!function_exists('api')) {
    function api(): ApiResponse
    {
        return app(ApiResponse::class);
    }
}
