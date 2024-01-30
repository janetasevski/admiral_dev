<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'position' => 'required'
        ]);

        $data = $request->except(['_token', '_method']);
        Employee::create($data);

        return redirect('/')->with('success', 'Employee created successfully');
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', ['employee' => $employee]);
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

        Employee::find($id)->update($data);

        return redirect('/employees')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }
}
