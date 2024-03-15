<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Repetiteur;
class RepetiteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Repetiteur::count() == 0) {
            Repetiteur::factory()
                ->count(10)
                ->create();
        }
    }
}
