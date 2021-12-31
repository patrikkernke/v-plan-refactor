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
        $isValid = Hash::check($request->input('geheim'), env('TOKEN_PUBLIC'));

        ray(URL::to(config('app.url')));
        if ($isValid === false) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
