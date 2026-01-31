<?php

namespace Maimalee\LaravelApiResponse\Tests;

use Maimalee\LaravelApiResponse\Exceptions\ApiException;

class ExceptionTest extends TestCase
{
    public function test_api_exception_handling()
    {
        $exception = new ApiException('Forbidden', 403, ['reason' => 'blocked']);
        $response = app(\Illuminate\Contracts\Debug\ExceptionHandler::class)
            ->render(request(), $exception);

        $data = $response->getData(true);

        $this->assertEquals('error', $data['status']);
        $this->assertEquals('Forbidden', $data['message']);
        $this->assertEquals(['reason' => 'blocked'], $data['errors']);
    }
}
