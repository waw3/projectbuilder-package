<?php

namespace Anibalealvarezs\ProjectBuilder;

use Illuminate\Support\ServiceProvider;

class ProjectBuilderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Anibalealvarezs\ProjectBuilder\ProjectBuilderController');
        $this->loadViewsFrom(__DIR__.'/views', 'builder');
    }
}