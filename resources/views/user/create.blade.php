<x-layout>
    <div class="container mt-5 mb-5">

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
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button class="btn btn-outline-secondary showPasswordBtn" data-target="password">
                                Show
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Create</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger">Cancel</a>
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
        // Script to toggle password visibility
        document.querySelectorAll('.showPasswordBtn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                // Get the target password input field ID
                var targetId = this.getAttribute('data-target');
                var targetInput = document.getElementById(targetId);

                // Toggle visibility of the target password input
                if (targetInput.type === "password") {
                    targetInput.type = "text";
                    // Add the Bootstrap class .active to indicate that the button has been clicked
                    this.classList.add('active');
                } else {
                    targetInput.type = "password";
                    // Remove the Bootstrap class .active when the button is clicked again
                    this.classList.remove('active');
                }
            });
        });
    </script>
</x-layout>
