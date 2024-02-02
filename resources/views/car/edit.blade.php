<x-layout>
    <x-slot name="title">
        Car Management
    </x-slot>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Edit Car</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('car.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand"
                            value="{{ $car->brand }}">
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="model"
                            value="{{ $car->model }}">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year"
                            value="{{ $car->year }}">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color"
                            value="{{ $car->color }}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                        <a href="{{ route('car.index') }}" class="btn btn-outline-danger">Cancel</a>
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
        $(function() {
            $("#year").datepicker({
                changeYear: true,
                yearRange: "1900:+1", // Adjust the range as needed
                dateFormat: "yy"
            });
        });

        // Remove validation messages after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.text-danger').forEach(element => {
                element.remove();
            });
        }, 5000);
    </script>
</x-layout>
