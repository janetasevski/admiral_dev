<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Employees</h5>
                        <p class="card-text">View and manage employees here.</p>
                        <a href="{{ route('employee.index') }}" class="btn btn-primary">Employees</a>
                    </div>
                </div>
            </div>
            @if (auth()->user()->isAdmin())
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">View and manage users here.</p>
                            <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
