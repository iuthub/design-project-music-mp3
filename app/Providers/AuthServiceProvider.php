<?php

namespace App\Providers;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContact;
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
    public function boot(GateContact $gate)
    {
        $this->registerPolicies();
        $gate->define('admin', function (User $user){
            foreach($user->roles as $role){
                if ($role->name==='Admin'){
                    return TRUE;
                }
            }
            return FALSE;
        });
    }
}
