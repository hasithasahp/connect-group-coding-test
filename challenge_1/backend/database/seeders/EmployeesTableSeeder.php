<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Let's create 50 employees
        for ($i=0; $i < 10; $i++) { 
            Employee::create([
                'name' => $faker->name(),
                'birthday' => $faker->date(),
                
                //Assuming the birthday is not used to generate NIC number by government
                'nic_no' => $faker->regexify('[3-9]{1}[0-9]{10}[V]') 
            ]);
        }
    }
}
