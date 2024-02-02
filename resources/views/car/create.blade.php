<x-layout>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Add Car</h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('car.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand"
                            value="{{ old('brand') }}">
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model" name="model"
                            value="{{ old('model') }}">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="year" name="year"
                            value="{{ old('year') }}">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color"
                            value="{{ old('color') }}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Create</button>
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
</x-layout>
