<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 cities with random names and associate them with a country
        \App\Models\City::factory(10)->create()->each(function ($city) {
            // For each city, create 5 people associated with that city
            $city->people()->saveMany(\App\Models\Person::factory(5)->make());
        });
    }
}
