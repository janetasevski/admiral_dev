<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PeopleTableSeeder extends Seeder
{
    public function run()
    {
        $peopleData = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'phone_number' => '1234567890',
                'city' => 'New York',
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane@example.com',
                'phone_number' => '9876543210',
                'city' => 'Los Angeles',
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Smith',
                'email' => 'alice@example.com',
                'phone_number' => '5551234567',
                'city' => 'Chicago',
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson',
                'email' => 'bob@example.com',
                'phone_number' => '5559876543',
                'city' => 'Houston',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Brown',
                'email' => 'emily@example.com',
                'phone_number' => '5557890123',
                'city' => 'San Francisco',
            ],
            // Add more records as needed
        ];

        foreach ($peopleData as $personData) {
            Person::create($personData);
        }
    }
}
