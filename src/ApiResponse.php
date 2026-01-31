<?php

namespace Maimalee\LaravelApiResponse;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApiResponse
{
    protected array $meta = [];

    // Helper to fetch configurable keys
    protected function key(string $name): string
    {
        return config("api-response.keys.$name", $name);
    }

    // Success response
    public function success($data = null, string $message = 'Success', int $code = 200)
    {
        // Auto-detect paginator
        if ($data instanceof LengthAwarePaginator) {
            return $this->paginate($data, $message);
        }

        return response()->json([
            $this->key('status')  => 'success',
            $this->key('message') => $message,
            $this->key('data')    => $data,
            $this->key('meta')    => $this->meta,
        ], $code);
    }

    // Error response
    public function error(string $message, int $code = 400, array $errors = [])
    {
        return response()->json([
            $this->key('status')  => 'error',
            $this->key('message') => $message,
            $this->key('errors')  => $errors,
        ], $code);
    }

    // Attach extra meta data
    public function withMeta(array $meta): self
    {
        $this->meta = $meta;
        return $this;
    }

    // Pagination helper
    public function paginate(LengthAwarePaginator $paginator, string $message = 'Data fetched')
    {
        return response()->json([
            $this->key('status')  => 'success',
            $this->key('message') => $message,
            $this->key('data')    => $paginator->items(),
            $this->key('meta')    => [
                'pagination' => [
                    'total'        => $paginator->total(),
                    'count'        => $paginator->count(),
                    'per_page'     => $paginator->perPage(),
                    'current_page' => $paginator->currentPage(),
                    'total_pages'  => $paginator->lastPage(),
                ]
            ],
        ]);
    }
}
