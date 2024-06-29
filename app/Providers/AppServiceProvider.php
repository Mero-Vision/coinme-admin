<?php

namespace App\Providers;

use App\Models\TimeZone;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('timezones')) {
            $timezone = TimeZone::first();
            if ($timezone) {
                Config::set('app.timezone', $timezone->name);
                date_default_timezone_set($timezone->name);
            }
        }
    }
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   
}