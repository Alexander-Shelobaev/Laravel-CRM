<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\User;
//use App\Permission;

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

        // Проверка права пользователя на доступ к разделу
        Gate::define('Access_check', function (User $user, $code_access) {
            $code_access = unserialize($code_access);
            $coincidence = 0;
            $perm_code_arr = array();

            foreach ($user->roles as $role) {
                foreach ($role->permissions as $key => $perm) {
                    $perm_code_arr[] = $perm->code;
                }
            }

            $array_intersect = array_intersect($code_access, $perm_code_arr);
            if (count($code_access) === count($array_intersect)) {
                return true;
            }
            return false;
        });

    }
}
