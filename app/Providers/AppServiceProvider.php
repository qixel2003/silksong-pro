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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('edit-build', function (User $user, Build $build){
            // Only the creator can edit
            return $build->user->is($user);
        });
    }
}
