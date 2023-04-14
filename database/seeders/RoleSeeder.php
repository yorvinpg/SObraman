<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un rol
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Tecnico']);

        // Crear un permiso
        $permission = Permission::create(['name' => 'dash.index']);

        // Asignar el permiso al rol
        $role1 ->givePermissionTo($permission);
    }
}
