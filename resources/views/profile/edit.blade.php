<x-layout>
    <div class="container mt-5 mb-5">

        <x-slot name="title">
            Edit Profile
        </x-slot>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Edit Profile</h1>
                </div>

                <form action="{{ route('edit.profile') }}" method="POST">
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

                        <label for="current_password" class="form-label">Current Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <button type="button" class="btn btn-outline-secondary showPasswordBtn"
                                data-target="current_password">
                                Show
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">

                        <label for="password" class="form-label">New Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button type="button" class="btn btn-outline-secondary showPasswordBtn"
                                data-target="password">
                                Show
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                            <button type="button" class="btn btn-outline-secondary showPasswordBtn"
                                data-target="password_confirmation">
                                Show
                            </button>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-success">Update Profile</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">Cancel</a>
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
        // Remove validation messages after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.text-danger').forEach(element => {
                element.remove();
            });
        }, 5000);

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
