<?php

namespace App\Http\Controllers;

use App\Repositories\CarRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }
    public function index()
    {
        $cars = $this->carRepository->getAll();
        return view('cars.index', compact($cars));
    }

    public function create()
    {
        $cars = $this->carRepository->getAll();
        return view('cars.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $request->except(['_token', '_method']);
        $this->carRepository->create($data);

        return redirect('/employees')->with('success', 'Successfully created car');
    }

    public function edit($id)
    {
        $car = $this->carRepository->getById($id);
        return view('cars.edit', compact($car));
    }

    public function update($id, Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $this->carRepository->update($id, $data);
    }
    public function delete($id)
    {
        $this->carRepository->delete($id);
    }
}
