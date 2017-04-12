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

        $this->publishes([
            __DIR__ . '/assets/images' => public_path('images'),
        ], 'public');
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
