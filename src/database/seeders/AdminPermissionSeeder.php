<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;


class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => '管理者',
            'email' => 'kanrisya@sample.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $manager = User::create([
            'name' => '店舗代表者１',
            'email' => 'tenpo1@sample.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);

        $adminAccessPermission = Permission::create(['name' => 'adminAccess']);
        $managerAccessPermission = Permission::create(['name' => 'managerAccess']);
        
        $adminRole->givePermissionTo($adminAccessPermission);
        $managerRole->givePermissionTo($managerAccessPermission);

        $admin->assignRole($adminRole);
        $manager->assignRole($managerRole);
    }
}
