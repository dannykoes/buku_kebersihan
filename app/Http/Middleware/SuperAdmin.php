<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id == 0 && Auth::user()->role == null) {
            return $next($request);
        }
        return Redirect::back()->with('info', 'Halaman tidak ditemukan');
    }
}
