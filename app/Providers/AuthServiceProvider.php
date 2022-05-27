<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });

        Gate::define('visit-return-rental-page', function (User $user) {
           return $user->isCustomer()
                       ? Response::allow()
                       : Response::deny('You must be a customer.');
        });

        Gate::define('visit-manage-rental-page', function (User $user) {
            return $user->isStaffOrAdmin()
                        ? Response::allow()
                        : Response::deny('You must be a staff or web manager.');
        });

        Gate::define('visit-manage-computers-page', function (User $user) {
            return $user->isStaffOrAdmin()
                        ? Response::allow()
                        : Response::deny('You must be a staff or web manager.');
        });

        Gate::define('visit-staff-manage-users-page', function (User $user) {
            return $user->isStaff()
                        ? Response::allow()
                        : Response::deny('You must be a staff.');
        });

        Gate::define('visit-admin-manage-users-page', function (User $user) {
            return $user->isAdmin()
                        ? Response::allow()
                        : Response::deny('You must be a web manager.');
        });

        Gate::define('visit-admin-dashboard-page', function (User $user) {
            return $user->isAdmin()
                        ? Response::allow()
                        : Response::deny('You must be a web manager.');
        });
    }
}
