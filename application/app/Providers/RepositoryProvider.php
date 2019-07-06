<?php

namespace App\Providers;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ForumInterface::class, ForumRepository::class);
    }
}
