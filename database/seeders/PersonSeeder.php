<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 people with random names and associate them with a city
        \App\Models\Person::factory(10)->create()->each(function ($person) {
            // For each person, associate them with a random city
            $person->city()->associate(\App\Models\City::inRandomOrder()->first());
            $person->save();
        });
    }
}
