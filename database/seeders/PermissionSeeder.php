<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use BasicDashboard\Foundations\Domain\Users\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = config('numbers.permissions');
        $permissions = ['manage','show','create','edit','delete'];
        foreach($features as $feature){
            foreach($permissions as $permission){
                Permission::create([
                    'name' => $permission . ' ' . $feature
                ]);
            }
        }

        Permission::create([
            'name' => 'publish articles'
        ]);

        $role = Role::create(['name' => 'super_admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole($role->name);
        
        
    }
}
