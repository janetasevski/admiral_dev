<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate dummy data
        $employees = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'john@example.com',
                'phone' => '123456789',
                'city' => 'New York',
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'email' => 'jane@example.com',
                'phone' => '987654321',
                'city' => 'Los Angeles',
            ],
            // Add more dummy data as needed
        ];

        // Insert data into the employees table
        DB::table('employees')->insert($employees);
    }
}
