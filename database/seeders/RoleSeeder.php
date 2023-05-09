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
        /* SPA = SuperAdmin -> ALL
           AD = Administrador -> ver listados de tecnicos y operaciones normales
           TEC = Tecnicos  -> se limita algunas opcines     */
        $sa = Role::create(['name' => 'SPA']);
        $ad = Role::create(['name' => 'AD']);
        $tec = Role::create(['name' => 'TEC']);

        Permission::create(['name' => 'admin/dashboard'])->syncRoles($sa);
    }
}
