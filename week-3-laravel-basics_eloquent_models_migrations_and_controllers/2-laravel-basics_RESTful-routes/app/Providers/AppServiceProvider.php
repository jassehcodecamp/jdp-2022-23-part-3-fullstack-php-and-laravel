<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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

        DB::listen(function ($query) {
            logger($query->sql, ['query params' => $query->bindings]);
            // $query->bindings;
            // $query->time;
        });

    }
}
