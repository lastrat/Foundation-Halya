<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TrackVisit
{
    public function handle(Request $request, Closure $next)
    {
        $prefix = Route::current()->getPrefix();

        if ($prefix && Str::startsWith($prefix, 'admin')) {
            return $next($request);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return $next($request);
        }

        if (Session::has('visited')) {
            return $next($request);
        }

        Visit::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'visited_at' => now(),
        ]);

        Session::put('visited', true);

        return $next($request);
    }
}
