<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    public function getById($id): Employee
    {
        return $employee = Employee::with('car')->findOrFail($id);
    }

    public function getAll()
    {
        return Employee::with('car')->get();
    }

    public function create($employee)
    {
        return Employee::create($employee);
    }

    public function update($id, $data)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }
}
