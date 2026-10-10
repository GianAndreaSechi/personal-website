<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventAdminIndexing
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->is('admin', 'admin/*', 'login')) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
