<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class EnsurePublicTokenIsValidMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (config('pixelkode.token.public') === null) {
            return $next($request);
        }

        if ($request->input('neuwied') !== config('pixelkode.token.public')) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
