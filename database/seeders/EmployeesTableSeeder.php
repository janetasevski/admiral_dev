<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'phone' => '1234567890',
                'email' => 'john.doe@example.com',
                'position' => 'Developer',
                'car_id' => 1
            ],
            [
                'name' => 'Jane',
                'surname' => 'Doe',
                'phone' => '9876543210',
                'email' => 'jane.doe@example.com',
                'position' => 'Designer',
                'car_id' => 2
            ],
            [
                'name' => 'Joe',
                'surname' => 'Doe',
                'phone' => '9876543210',
                'email' => 'joe.doe@example.com',
                'position' => 'Tester',
                'car_id' => 3
            ],
        ];

        DB::table('employees')->insert($employees);
    }
}
