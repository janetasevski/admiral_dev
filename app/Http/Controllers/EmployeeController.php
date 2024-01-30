<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Method to display all employees
    public function index()
    {
        $employees = Employee::paginate(5);
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

        session()->flash('success', 'Employee added successfully.');
        // Redirect back to the home page with a success message
        return redirect('/employees');
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
        session()->flash('success', 'Employee details updated successfully.');
         return redirect('/employees');
    }

    // Method to delete the employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
         session()->flash('error', 'Employee deleted successfully');
        return redirect('/employees');
    }
}
