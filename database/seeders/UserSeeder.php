<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count(User::all())) {
            $roleSupAdm = Role::where('name', 'Super Admin')->first();
            User::create(
                [
                    'name' => 'Supper Admin',
                    'email' => 'superadmin@erepetiteur.com',
                    'password' => bcrypt('password'),
                    'role_id' => $roleSupAdm->id,
                ],

            );
        }
    }
}
