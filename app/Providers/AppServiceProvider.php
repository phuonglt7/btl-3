<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\RepositoryInterface;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\StorehouseRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
