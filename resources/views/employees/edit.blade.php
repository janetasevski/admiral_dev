<!-- resources/views/employees/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <h1>Edit Employee</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.update', $employee->id) }}" style="margin-top: 20px;">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $employee->name) }}" required>
        <br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="{{ old('surname', $employee->surname) }}" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>
        <br>
        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position', $employee->position) }}" required>
        <br>
        <button type="submit"
            style="background-color: #007bff; color: #fff; border: none; padding: 8px 16px; cursor: pointer;">Update
            Employee</button>
    </form>

    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
