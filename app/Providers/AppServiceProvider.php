<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('IsSuperadmin', function () {
            return Auth::user()->role == 0;
        });
        Blade::if('IsSpv', function () {
            return Auth::user()->role == 1;
        });
        Blade::if('IsClc', function () {
            return Auth::user()->role == 2;
        });
        Blade::if('IsPtgs', function () {
            return Auth::user()->role == 3;
        });
    }
}
