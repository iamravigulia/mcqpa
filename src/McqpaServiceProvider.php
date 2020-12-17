<?php

namespace edgewizz\mcqpa;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class McqpaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edgewizz\Mcqpa\Controllers\McqpaController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd($this);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__ . '/components', 'mcqpa');
        Blade::component('mcqpa::mcqpa.open', 'mcqpa.open');
        Blade::component('mcqpa::mcqpa.index', 'mcqpa.index');
        Blade::component('mcqpa::mcqpa.edit', 'mcqpa.edit');
    }
}
