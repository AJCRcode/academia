<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Console\PackageDiscoverCommand;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'docente']);
        $role3 = Role::create(['name' => 'estudiante']);

        Permission::create(['name' => 'admin.home']);

        Permission::create(['name' => 'admin.users.index']);
        Permission::create(['name' => 'admin.users.edit']);

        Permission::create(['name' => 'admin.permissions.index']);
        Permission::create(['name' => 'admin.permissions.edit']);

        Permission::create(['name' => 'admin.roles.index']);
        Permission::create(['name' => 'admin.roles.edit']);
        Permission::create(['name' => 'admin.roles.create']);
        Permission::create(['name' => 'admin.roles.show']);
        Permission::create(['name' => 'admin.roles.destroy']);
    }
}
