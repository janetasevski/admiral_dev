<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    protected $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    // Method to retrieve all employees
    public function all()
    {
        return $this->model->paginate(5);
    }

    // Method to create a new employee
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Method to update an existing employee
    public function update(Employee $employee, array $data)
    {
        $employee->update($data);
        return $employee;
    }

    // Method to delete an employee
    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
