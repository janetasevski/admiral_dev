<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;



class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for cars
        $cars = [
            ['brand' => 'Toyota', 'model' => 'Camry', 'year' => 2022, 'color' => 'Black'],
            ['brand' => 'Honda', 'model' => 'Civic', 'year' => 2021, 'color' => 'White'],
            ['brand' => 'Ford', 'model' => 'Mustang', 'year' => 2023, 'color' => 'Red'],
        ];

        // Insert the sample data into the cars table
        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}


