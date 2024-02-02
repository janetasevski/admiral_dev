<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    public function getById($id)
    {
        return $car = Car::findOrFail($id);
    }

    public function getAll()
    {
        return $cars = Car::all();
    }

    public function create($car)
    {
        return Car::create($car);
    }
    public function update($id, $car)
    {
        $car = Car::findOrFail($id);
        $car->update($car);
        return $car;
    }
    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
    }
}
