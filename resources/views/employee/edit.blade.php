<x-layout>
    <div class="container mt-5 mb-5">
        <x-slot name="title">
            Employee Management
        </x-slot>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h2>Edit Employee</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $employee->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                            value="{{ $employee->surname }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $employee->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ $employee->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ $employee->city }}">
                    </div>
                    <div class="mb-3">
                        <label for="car_id" class="form-label">Assigned Car</label>
                        <select class="form-select" name="car_id" id="car_id">
                            <option value="">No Car Assigned</option>
                            @foreach ($availableCars as $car)
                                <option value="{{ $car->id }}"
                                    {{ $employee->car && $employee->car->id == $car->id ? 'selected' : '' }}>
                                    {{ $car->brand }} - {{ $car->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                        <a href="/" class="btn btn-outline-danger">Cancel</a>
                    </div>
                    @if ($errors->any())
                        <div class="mt-3">
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script>
        // Remove validation messages after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.text-danger').forEach(element => {
                element.remove();
            });
        }, 5000);
    </script>
</x-layout>
