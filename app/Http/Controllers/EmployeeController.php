<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    // Method to display all employees
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    // Method to display the form for adding a new employee
    public function create()
    {
        return view('employee.create');
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
        ]);

        // Create a new employee instance with the validated data
        $employee = new Employee($validatedData);

        // Save the employee to the database
        $employee->save();

        // Redirect back to the home page with a success message
        return back()->with('message', 'Employee added successfully.');
    }

    // Method to display the employee edit form
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    // Method to update the employee data
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|',
            'phone' => 'required||max:20',
            'city' => 'required',
        ]);

        $employee->update($validatedData);

         return redirect('/')->with('message', 'Employee details updated successfully.');
    }

    // Method to delete the employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/')->with('message', 'Employee deleted successfully.');
    }
}
