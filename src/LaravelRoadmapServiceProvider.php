<?php

namespace Sahapranta\LaravelRoadmap;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelRoadmapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . './../config/config.php', 'roadmap');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('roadmap.php'),
            ], 'config');
        }

        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'roadmap');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('roadmap.prefix'),
            'middleware' => config('roadmap.middleware'),
        ];
    }
}
