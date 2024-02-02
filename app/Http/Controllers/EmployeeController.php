<?php

namespace App\Http\Controllers;

use App\Repositories\CarRepository;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeeRepository;
    protected $carsRepository;


    public function __construct(EmployeeRepository $employeeRepository, CarRepository $carsRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->carsRepository = $carsRepository;
    }

    public function index()
    {
        $employees = $this->employeeRepository->getAll();
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        $cars = $this->carsRepository->getAll();
        return view('employees.create', compact('cars'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'position' => 'required',
            'car_id' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);

        $carId = $data['car_id'];
        $car = $this->carsRepository->getById($carId);

        $this->employeeRepository->create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position' => $data['position'],
            'car_id' => $car->id,
        ]);

        return redirect('/employees')->with('success', 'Employee created successfully');
    }
    public function edit($id)
    {
        $employee = $this->employeeRepository->getById($id);
        $cars = $this->carsRepository->getAll();
        return view('employees.edit', ['employee' => $employee, 'cars' => $cars]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'position' => 'required',
        ]);

        // Remove '_token' and '_method' from the update data
        $data = $request->except(['_token', '_method']);
        $this->employeeRepository->update($id, $data);

        return redirect('/employees')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }
}
