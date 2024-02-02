@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <h1>Edit Employee</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.update', $employee->id) }}" style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $employee->name) }}" required>

        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="{{ old('surname', $employee->surname) }}" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>

        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position', $employee->position) }}" required>

        <label for="car_id">Select Car:</label>
        <select name="car_id">
            <option value="" disabled>Select a car</option>
            @foreach ($cars as $car)
                <option value="{{ $car->id }}" {{ old('car_id', optional($employee->car)->id) == $car->id ? 'selected' : '' }}>
                    {{ $car->model }} - {{ $car->year }} - {{ $car->color }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Employee</button>
    </form>

    <style>
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        div.success {
            color: green;
            margin-top: 10px;
        }
    </style>
@endsection
