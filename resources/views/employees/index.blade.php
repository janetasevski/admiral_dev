<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
    <h1>Employee List</h1>

    <a href="{{ route('employees.create') }}">Create New Employee</a>

    <ul>
        @foreach ($employees as $employee)
            <li>
                {{ $employee->name }} {{ $employee->surname }} {{ $employee->email }} {{ $employee->phone }}
                {{ $employee->position }} -
                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                <form method="post" action="{{ route('employees.destroy', $employee->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
