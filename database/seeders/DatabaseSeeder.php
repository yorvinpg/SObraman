<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //permisos

        $permisos = [
            'ver-ot',
            'crear-ot',
            'editar-ot',
            'anular-ot',
            // rol
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'anular-rol',
            // usuario
            'ver-user',
            'crear-user',
            'editar-user',
            'anular-user',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
