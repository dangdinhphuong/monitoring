<?php

namespace App\Providers;

use App\Models\Permissions;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        $this->registerPolicies();
        if (Schema::hasTable('permissions')) {
            Permissions::where('parent_id', '>', '0')->get()->map(function ($permission) {
                Gate::define($permission->key_code, function (User $user) use ($permission) {

                    $role = $user->roles;
                    $permissions = $role->permissions;
                    if ($permissions->contains('key_code', $permission->key_code)) {
                        return true;
                    }
                });
            });
        }
    }
}
