<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
    <h1>Employee List</h1>

    <a href="{{ route('employees.create') }}">Create New Employee</a>

    <table style="width:100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Car</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->surname }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ optional($employee->car)->model }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                        <form method="post" action="{{ route('employees.destroy', $employee->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        button {
            color: #fff;
            background-color: #dc3545;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
@endsection
