<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Employees</h5>
                        <p class="card-text">View and manage employees here.</p>
                        <a href="{{ route('employee.index') }}" class="btn btn-primary">View Employees</a>
                    </div>
                </div>
            </div>
            @if (auth()->user()->isAdmin())
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">View and manage users here.</p>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cars</h5>
                        <p class="card-text">View and manage cars here.</p>
                        <a href="{{ route('car.index') }}" class="btn btn-primary">View Cars</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
