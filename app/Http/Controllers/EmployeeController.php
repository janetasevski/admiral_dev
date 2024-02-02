<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    // Method to display all employees
    public function index()
    {
        // Paginate employees with eager loaded cars
        $employees = Employee::with('car')->paginate(10);
        return view('employee.index', compact('employees'));
    }

    // Method to display the form for adding a new employee
    public function create()
    {
    $availableCars = Car::all();

    return view('employee.create', compact('availableCars'));
    }

  // Method to store the new employee data
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
        'phone' => 'required|max:20',
        'city' => 'required',
        'car_id' => [
            'nullable',
            'exists:cars,id',
            function ($attribute, $value, $fail) {
                //The $attribute parameter holds the name of the attribute being validated (in this case, 'car_id').
                // Check if the car is already assigned to another employee
                if ($value) {
                    $car = Car::find($value);
                    if ($car && $car->employee_id !== null) {
                        $fail('The selected car is already assigned to another employee.');
                    }
                }
            }
        ]
    ]);

    // Create a new employee using the repository
    $employee = $this->employeeRepository->create($validatedData);

    // If a car_id is provided, associate the employee with the selected car
    if ($request->filled('car_id')) {
        $car = Car::findOrFail($request->input('car_id'));
        $car->employee_id = $employee->id;
        $car->save();
    }

    session()->flash('success', 'Employee added successfully.');
    // Redirect back to the home page with a success message
    return redirect()->route('employee.index');
}

    // Method to display the employee edit form

    public function edit($id)
    {
        // Find the employee
        $employee = Employee::findOrFail($id);

        // Get all available cars
        $availableCars = Car::all();

        return view('employee.edit', compact('employee', 'availableCars'));
    }



// Method to update the employee data
public function update(Request $request, Employee $employee)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email',
        'phone' => 'required|max:20',
        'city' => 'required',
        'car_id' => [
            'nullable',
            'exists:cars,id',
            function ($attribute,$value, $fail) {

                //The $attribute parameter holds the name of the attribute being validated (in this case, 'car_id').
                // Check if the car is already assigned to another employee

                if ($value) {
                    $car = Car::find($value);
                    if ($car && $car->employee_id !== null) {
                        $fail('The selected car is already assigned to another employee.');
                    }
                }
            }
        ]
    ]);

    // Update the employee's attributes
    $employee->update($validatedData);

    
    if ($request->filled('car_id')) {
        $car = Car::findOrFail($request->input('car_id'));
        $car->employee_id = $employee->id;
        $car->save();
    } else {
        if ($employee->car) {
            $employee->car->employee_id = null;
            $employee->car->save();
        }
    }

    session()->flash('success', 'Employee details updated successfully.');
    return redirect()->route('employee.index');
}




   // Method to delete the employee

public function destroy(Employee $employee)
{
    // Check if the employee has a car associated
    if ($employee->car) {
        // If the employee has a car, disassociate the car
        $employee->car->employee_id = null;
        $employee->car->save();
    }

    // Delete the employee
    $employee->delete();

    session()->flash('error', 'Employee deleted successfully');
    return redirect()->route('employee.index');
}
}
