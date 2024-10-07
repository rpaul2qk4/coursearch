<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class, 
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
         $this->registerPolicies();
		
		
		  /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->hasRole('Admin');
        });
       
        /* define a manager user role */
        Gate::define('isUser', function($user) {
            return $user->hasRole('User');
        });
       
        /* define a user role */
        Gate::define('isAgent', function($user) {
            return $user->hasRole('Agent');
        });
		
		
    }
}
