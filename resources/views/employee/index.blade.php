<x-layout>
    <x-slot name="title">
        Employees
    </x-slot>

    <div class="container mt-5 mb-5">
        <div class="mb-3">
            <a href="{{ route('employee.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add
                Employee</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">Car</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->surname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->city }}</td>
                            <td>
                                @if ($employee->car)
                                    {{ $employee->car->brand }} {{ $employee->car->model }}
                                @else
                                    No Car Assigned
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employee.edit', $employee->id) }}"
                                    class="btn btn-outline-success btn-sm"><i class="fas fa-edit "></i></a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?')"><i
                                            class="fas fa-trash"> </i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $employees->links('pagination::bootstrap-4') }}
        </div>

    </div>

</x-layout>
