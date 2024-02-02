@extends('layouts.app')

@section('title', 'Create New Employee')

@section('content')
    <h1>Create New Employee</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.store') }}" style="margin-top: 20px;">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="{{ old('surname') }}" required>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position') }}" required>
        <label for="car_id">Select Car:</label>
        <select name="car_id">
            <option value="" disabled selected>Select a car</option>
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->model }} - {{ $car->year }} - {{ $car->color }}
                </option>
            @endforeach
        </select>

        <button type="submit">Create Employee</button>
    </form>

    <style>
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select option {
            padding: 10px;
            background-color: #fff;
        }

        select option:hover {
            background-color: #f0f0f0;
        }

        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        div.success {
            color: green;
            margin-top: 10px;
        }
    </style>
@endsection
