<!-- resources/views/people/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Person Details</h2>
        <form>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" value="{{ $person->first_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{ $person->last_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $person->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" value="{{ $person->phone_number }}" readonly>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" value="{{ $person->city }}" readonly>
            </div>
        </form>
    </div>
@endsection
