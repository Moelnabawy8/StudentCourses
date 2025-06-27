<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
            ->count(20) // Specify the number of countries to create
            ->create();
    }
}
