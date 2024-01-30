<!-- resources/views/employees/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <h1>Edit Employee</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.update', $employee->id) }}">
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
        <button type="submit">Update Employee</button>
    </form>
@endsection
