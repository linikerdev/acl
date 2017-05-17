<?php

namespace App\Providers;

use App\Permission;
use App\Policies\PostPolicy;
use App\Post;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $user = User::find(2);
        dd($user->hasRole('edit'));

        $this->registerPolicies($gate);

        if(!app()->runningInConsole()){

            $permissions = Permission::with('roles')->get();
            foreach ($permissions as $p):
                $gate->define($p->name, function (User $user) use ($p){
                    return $user->isAdmin() ||  $user->hasRole($p->roles);
                    });
            endforeach;
        }

    }
}
