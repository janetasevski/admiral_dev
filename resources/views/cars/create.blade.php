@extends('layouts.app')

@section('title', 'Create New Car')

@section('content')
    <h1>Create New Car</h1>

    <form method="post" action="{{ route('cars.store') }}" style="margin-top: 20px;">
        @csrf
        <label for="model">Model:</label>
        <input type="text" name="model" value="{{ old('model') }}" required>

        <label for="year">Year:</label>
        <input type="text" name="year" value="{{ old('year') }}" required>

        <label for="color">Color:</label>
        <input type="text" name="color" value="{{ old('color') }}" required>

        <button type="submit">Create Car</button>
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
    </style>
@endsection
