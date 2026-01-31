<?php

namespace Maimalee\LaravelApiResponse\Tests;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationTest extends TestCase
{
    public function test_paginate_response()
    {
        $items = collect([1,2,3,4,5]);
        $paginator = new LengthAwarePaginator($items, 5, 5, 1);

        $response = api()->paginate($paginator);

        $data = $response->getData(true);

        $this->assertEquals('success', $data['status']);
        $this->assertArrayHasKey('pagination', $data['meta']);
    }
}
