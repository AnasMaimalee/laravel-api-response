<?php

namespace Maimalee\LaravelApiResponse\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Maimalee\LaravelApiResponse\ApiResponseServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [ApiResponseServiceProvider::class];
    }
}
