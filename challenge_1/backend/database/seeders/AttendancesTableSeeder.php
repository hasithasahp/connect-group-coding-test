<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 2; $i++) {
            $schedule = Schedule::all()->random()->id;
            $shift = Schedule::find($schedule)->shift_id;
            $shiftStarts = Shift::find($shift)->starts_at;
            $shiftEnds = Shift::find($shift)->ends_at;

            $checkin = $faker->dateTimeBetween($shiftStarts, $shiftStarts.' + 5 minutes');
            $checkout = $faker->dateTimeBetween($shiftEnds, $shiftEnds.' + 15 minutes');
            Attendance::create([
                'schedule_id' => $schedule,
                'emp_id' => Employee::all()->random()->id,
                'checkin_at' => $checkin,
                'checkout_at' => $checkout,
                'worked_hours' => Carbon::parse($checkin)->floatDiffInHours($checkout)
            ]);
        }
    }
}
