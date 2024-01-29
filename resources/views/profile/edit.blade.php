<x-layout>

    @section('title', 'Edit Profile')
    <div class="container mt-5">
        <h1>Edit Profile</h1>
        <form action="{{ route('edit.profile') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ auth()->user()->email }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>


            <button type="submit" class="btn btn-primary">Update Profile</button>
            <a href="/" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</x-layout>
