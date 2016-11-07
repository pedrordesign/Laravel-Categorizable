<?php

namespace BrianFaust\Categorizable;

use Cviebrock\EloquentSluggable\SluggableServiceProvider;
use BrianFaust\ServiceProvider\ServiceProvider;

class CategorizableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(SluggableServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(parent::provides(), [
            SluggableServiceProvider::class,
        ]);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'categorizable';
    }
}
