<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user){
            return $user->level === 'admin';
        });

        Gate::define('desainer', function(User $user){
            return $user->level === 'desainer';
        });

        Gate::define('customer', function(User $user){
            return $user->level === 'customer';
        });

        Gate::define('duo', function(User $user){
            return $user->level !== 'customer';
        });
        
    }
}
