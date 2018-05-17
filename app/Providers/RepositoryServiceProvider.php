<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\RoleRepository',
            'App\Repositories\RoleRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\PermissionRepository',
            'App\Repositories\PermissionRepositoryEloquent'
        );
    }
}
