<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(1900, (int)date('Y') + 1),
            'color' => $this->faker->colorName,
        ];
    }
}

