<?php

namespace Inspirium\SKTemplate;

use Illuminate\Support\ServiceProvider;

class SKTemplateServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom( __DIR__ . '/views', 'sktemplate' );

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->publishes([
            __DIR__ . '/assets/images' => public_path('images'),
        ], 'public');

        $this->publishes([
            __DIR__ . '/translations' => resource_path('lang')
        ], 'translations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
