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

            $this->publishes($this->listMigrations(), 'migrations');
        }

        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'roadmap');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
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

    protected function listMigrations(): array
    {
        $files = $this->app->make('files')->allFiles(__DIR__ . '/../database/migrations');

        $filesArray = [];

        foreach ($files as $file) {
            $filesArray[$file->getPath()] = database_path("migrations/{$file->getFilename()}");
        }

        return $filesArray;
    }
}
