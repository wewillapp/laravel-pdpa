<?php

namespace Wewillapp\LaravelPdpa;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class LaravelPdpaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-pdpa');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-pdpa');

        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/laravel-pdpa'),
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-pdpa'),
        ], 'laravel-pdpa');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-pdpa'),
        ], 'laravel-pdpa:view');

        $this->publishes([
            __DIR__.'/../config/laravel-pdpa.php' => config_path('laravel-pdpa.php')
        ], 'laravel-pdpa:config');
    }
}
