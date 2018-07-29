<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

//        Gate::resource('admin', 'App\Policies\AdminUsersPolicy');
//
//        Gate::define('admin.userdelete', 'App\Policies\AdminUsersPolicy@userdelete');
//
//        Gate::define('admin.role', 'App\Policies\AdminUsersPolicy@role');
//
//        Gate::define('admin.permission', 'App\Policies\AdminUsersPolicy@permission');


    }
}
