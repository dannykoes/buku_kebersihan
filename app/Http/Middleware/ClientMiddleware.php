<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if ($request->user()->role == 2) {
            return $next($request);
        }
        if ($request->user()->role == 0 || !$request->user()->role) {
            return $next($request);
        }
        // return response()->json(['message' => 'Akses Dibatasi ']);
        return Redirect::back()->with('info', 'Akses Dibatasi');
    }
}
