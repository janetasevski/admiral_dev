<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    // Method to display all cars
    public function index()
    {
        // Retrieve all cars using the repository
        $cars = $this->carRepository->all();
        return view('car.index', compact('cars'));
    }

    // Method to display the form for adding a new car
    public function create()
    {
        return view('car.create');
    }

    // Method to store the new car data
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Use (current year + 1) for max year
            'color' => 'required',
        ]);

        // Create a new car using the repository
        $this->carRepository->create($validatedData);

        session()->flash('success', 'Car added successfully.');
        // Redirect back to the cars index page with a success message
        return redirect()->route('car.index');
    }

    // Method to display the car edit form
    public function edit(Car $car)
    {
        return view('car.edit', compact('car'));
    }

    // Method to update the car data
    public function update(Request $request, Car $car)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1), // Use (current year + 1) for max year
            'color' => 'required',
        ]);

        // Update the car using the repository
        $this->carRepository->update($car, $validatedData);

        session()->flash('success', 'Car details updated successfully.');
        return redirect()->route('car.index');
    }

    // Method to delete the car
    public function destroy(Car $car)
    {
        // Delete the car using the repository
        $this->carRepository->delete($car);
        session()->flash('error', 'Car deleted successfully');
        return redirect()->route('car.index');
    }
}

