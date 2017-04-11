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
