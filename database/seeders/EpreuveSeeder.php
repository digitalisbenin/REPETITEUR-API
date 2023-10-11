<?php

namespace Database\Seeders;

use App\Models\Epreuve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpreuveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Epreuve::count() == 0) {
            Epreuve::factory()
                ->count(8)
                ->create();
        }
    }
}
