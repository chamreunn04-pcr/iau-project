<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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
        Schema::defaultStringLength(191);
        // Set locale from session (fallback to config('app.locale'))
        App::setLocale(Session::get('locale', config('app.locale')));
        // pagination
        Paginator::useBootstrapFive();
    }
}
