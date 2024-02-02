<x-layout>
    <x-slot name="title">
        Cars
    </x-slot>

    <div class="container mt-5">
        <div class="mb-3">
            <a href="{{ route('car.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Car</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">Color</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->color }}</td>
                            <td>
                                <a href="{{ route('car.edit', $car->id) }}" class="btn btn-outline-success btn-sm"><i
                                        class="fas fa-edit "></i></a>
                                <form action="{{ route('car.destroy', $car->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this car?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $cars->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-layout>
