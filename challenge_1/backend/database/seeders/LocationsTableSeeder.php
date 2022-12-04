<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Let's create 10 Locations
        for ($i=0; $i < 5; $i++) { 
            Location::create([
                'name' => $faker->company(),
                'address' => $faker->streetAddress(),
                'city' => $faker->city(),
                'country' => $faker->country(),
                'gps_cordinates' => $faker->latitude().', '.$faker->longitude(),
            ]);
        }
    }
}
