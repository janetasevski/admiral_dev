<!-- resources/views/employees/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create New Employee')

@section('content')
    <h1>Create New Employee</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('employees.store') }}">
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
        <button type="submit">Create Employee</button>
    </form>
@endsection
