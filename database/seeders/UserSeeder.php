<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'superadmin',
            'username'=> 'spadmin',
            'email' => 'spadmin@admin.com',
            'password' => 'prckok3ws', // password
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('SPA');
    }
}
