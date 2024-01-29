<x-layout>
    <div class="container mt-5">

        <x-slot name="title">
            User Management
        </x-slot>

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="text-center">
                    <h1>Create User</h1>
                </div>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button class="btn btn-outline-secondary" id="showPasswordBtn">
                                Show
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Create</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script to toggle password visibility
        document.getElementById('showPasswordBtn').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>
</x-layout>
