<?php

namespace Database\Seeders;

use App\Models\Tarification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Tarification::count() == 0) {
            Tarification::factory()
                ->count(10)
                ->create();
        }
    }
}
