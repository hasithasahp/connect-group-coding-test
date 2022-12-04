<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;
use Carbon\Carbon;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Let's create 5 Shifts
        for ($i=0; $i < 4; $i++) {
            $start = $faker->time('H:00:00');
            Shift::create([
                'name' => $faker->word(),
                'starts_at' => $start,
                'ends_at' => Carbon::parse($start)->addHours(random_int(4, 12)),
                'is_full_shift' => $faker->boolean(),
                'description' => $faker->realText(100, 2)
            ]);
        }
    }
}
