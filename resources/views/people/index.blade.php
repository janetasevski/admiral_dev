<!-- resources/views/people/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>People List</h1>
    <a href="{{ route('people.create') }}" class="btn btn-primary mb-3">Add Person</a>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <!-- <th>Email</th> -->
                <th>Phone Number</th>
                <!-- <th>City</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
                <tr>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <!-- <td>{{ $person->email }}</td> -->
                    <td>{{ $person->phone_number }}</td>
                    <!-- <td>{{ $person->city }}</td> -->
                    <td>
                        <a href="{{ route('people.show', $person->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('people.edit', $person->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this person?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
