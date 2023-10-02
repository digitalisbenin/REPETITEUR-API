<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count(Role::all())) {

            Role::create(
                [
                    'name' => 'Super Admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            );

            Role::create(

                [
                    'name' => 'Repetiteur',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            );

            Role::create(

                [
                    'name' => 'Parents',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
