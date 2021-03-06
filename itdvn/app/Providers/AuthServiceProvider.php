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

        //
    }

    public function registerPostPolices()
    {
        Gate::define('create-post', function ($user) {
            return $user->hasAccess(['create-post']);
        });

//        Gate::define('update-post', function ($user))
        Gate::define('edit-post', function ($user) {
            return $user->hasRole('editor');
        });
    }
}
