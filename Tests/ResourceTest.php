<?php

namespace Maimalee\LaravelApiResponse\Tests;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceTest extends TestCase
{
    public function test_resource_handling()
    {
        $resource = new class(['name' => 'Test']) extends JsonResource {
            public function toArray($request)
            {
                return $this->resource;
            }
        };

        $response = api()->success($resource);

        $data = $response->getData(true);
        $this->assertEquals(['name' => 'Test'], $data['data']);
    }
}
