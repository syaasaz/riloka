<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\User::class => \App\Policies\AdminPolicy::class,
        \Spatie\Permission\Models\Role::class => \App\Policies\AdminPolicy::class,
        \Spatie\Permission\Models\Permission::class => \App\Policies\AdminPolicy::class,

    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //tambahkan policies
        $this->registerPolicies();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        // Define a Gate for admin access
        Gate::define('akses-admin', function (User $user) {
            return $user->hasRole('admin');
        });
    }
}
