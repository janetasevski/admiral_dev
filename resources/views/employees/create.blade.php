<!-- resources/views/employees/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create New Employee')

@section('content')
    <h1>Create New Employee</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.store') }}" style="margin-top: 20px;">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname" value="{{ old('surname') }}" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br>
        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position') }}" required>
        <br>
        <button type="submit" style="background-color: #28a745; color: #fff; border: none; padding: 8px 16px; cursor: pointer;">Create Employee</button>
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
            background-color: #218838;
        }
    </style>
@endsection
