<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('administrator', function($user){
            return $user->roles == "Administrator";
        });
        Gate::define('guru', function($user){
            return $user->roles == "Guru";
        });
        Gate::define('siswa', function($user){
            return $user->roles == "Siswa";
        });                    
    }
}
