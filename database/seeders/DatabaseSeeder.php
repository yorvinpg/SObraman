<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //ROLES Y PERMISOS
        //Usuarios base
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        //$this->call(RoleSeeder::class);
    }
}
