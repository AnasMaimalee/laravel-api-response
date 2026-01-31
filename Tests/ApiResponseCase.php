<?php

namespace Maimalee\LaravelApiResponse\Tests;

use Maimalee\LaravelApiResponse\ApiResponse;

class ApiResponseTest extends TestCase
{
    public function test_success_response()
    {
        $response = api()->success(['foo' => 'bar'], 'All good', 200);

        $this->assertEquals('success', $response->getData(true)['status']);
        $this->assertEquals('All good', $response->getData(true)['message']);
        $this->assertEquals(['foo' => 'bar'], $response->getData(true)['data']);
    }

    public function test_error_response()
    {
        $response = api()->error('Oops', 400, ['field' => 'required']);

        $data = $response->getData(true);

        $this->assertEquals('error', $data['status']);
        $this->assertEquals('Oops', $data['message']);
        $this->assertEquals(['field' => 'required'], $data['errors']);
    }
}
