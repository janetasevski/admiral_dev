<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 3) as $index) {

            DB::table("cars")->insert([
                'model' => $faker->word,
                'year' => $faker->numberBetween(1990, 2024),
                'color' => $faker->colorName,
                // 'employee_id' => $index,
                'created_at' => now()
            ]);

            DB::table('cars')->insert([
                'model' => 'bmw' . $index,
                'year' => $faker->numberBetween(1990, 2024),
                'color' => $faker->colorName,
                // 'employee_id' => null,
                'created_at' => now()
            ]);
        }
    }
}
