<?php

namespace Database\Seeders;

use App\Models\Demande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Demande::count() == 0) {
            Demande::factory()
                ->count(15)
                ->create();
        }
    }
}
