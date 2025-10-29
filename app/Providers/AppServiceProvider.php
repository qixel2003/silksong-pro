<?php

namespace App\Providers;

use App\Models\Build;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $policies = [
        Build::class => BuildPolicy::class,
    ];
    public function register(): void
    {
        //
    }

//    public function before(User $user, $ability)
//    {
//        if ($user->isAdmin()) {
//            return true; // Admins = God
//        }
//    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Give admins access to everything
        Gate::before(function ($user, $ability) {
            if ($user->isAdmin()) {
                return true;
            }
        });

        Gate::define('edit-build', function (User $user, Build $build) {
            return $build->user->is($user);
        });
    }
}
