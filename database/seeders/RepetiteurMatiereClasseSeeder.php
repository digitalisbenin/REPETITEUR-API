<?php

namespace Database\Seeders;

use App\Models\RepetiteurMatiereClasse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepetiteurMatiereClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (RepetiteurMatiereClasse::count() == 0) {
            RepetiteurMatiereClasse::factory()
                ->count(10)
                ->create();
        }
    }
}
