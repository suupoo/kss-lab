<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FileCheckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'fileCheck',
            'App\Facades\Components\FileCheck'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
