<?php
namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    protected $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->paginate(5);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Car $car, array $data)
    {
        $car->update($data);
        return $car;
    }

    public function delete(Car $car)
    {
        $car->delete();
    }
}

