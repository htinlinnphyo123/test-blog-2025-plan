<?php
namespace Tests\Feature;

use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Support\Facades\Session;

trait TestingRequirement
{
    private function authenticateUser()
    {
        return $this->getRandomUser();
    }

    private function getRandomUser()
    {
        $user = User::first();
        if (!$user) {
            dd("please run \n php artisan db:seed \n");
        }
        return $user;
    }

    private function getPermissionForTesting(User $user)
    {
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        return implode(',', $permissions);
    }

    public function AuthenticateUserForCustomMiddleware()
    {
        $user = $this->authenticateUser();
        $permissionArr = $this->getPermissionForTesting($user);
        Session::flash('permission_key', $permissionArr);
        $this->actingAs($user);
    }

}
