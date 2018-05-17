<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         // criando os Gate de Acesso
         if ( Schema::hasTable('permissions') ){
            $perms = \App\Models\Permission::with('role')->get();
             foreach($perms as $kperm => $permission){
                Gate::define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }

            
        }
    }
}
