<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(ShiftsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
    }
}
