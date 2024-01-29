<x-layout>
    <div class="container mt-5">
        <x-slot name="title">
            User Management
        </x-slot>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Change Password</label>
                        <input type="password" class="form-control" id="password" name="password"x>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
