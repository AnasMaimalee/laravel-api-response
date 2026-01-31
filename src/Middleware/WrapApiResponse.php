<?php

namespace Maimalee\LaravelApiResponse\Middleware;

use Closure;
use Illuminate\Http\Request;

class WrapApiResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Skip if already a JSON response
        if ($response->headers->get('content-type') === 'application/json') {
            return $response;
        }

        // Wrap plain array / object responses automatically
        $content = $response->getOriginalContent() ?? $response->getContent();

        return api()->success($content);
    }
}
