<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Shift;
use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $employeeIds = Employee::pluck('id');
        $locationIds = Location::pluck('id');
        $shiftIds = Shift::pluck('id');

        // Let's create Shedule for a week
        for ($i=0; $i < 7; $i++) {
            for ($j=0; $j < 5; $j++) {
                Schedule::create([
                    'emp_id' => $faker->randomElement($employeeIds),
                    'loc_id' => $faker->randomElement($locationIds),
                    'shift_id' => $faker->randomElement($shiftIds),
                    'shift_date' => $faker->dateTimeBetween('+'. $i .' days', '+'. $i .' days'),
                    'description' => $faker->realText(100, 2)
                ]);
            }
        }
    }
}
