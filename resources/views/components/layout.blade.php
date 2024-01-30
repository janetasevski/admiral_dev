<!-- resources/views/components/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Employee Management' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>


<body class="pb-5">
    @if (session('success'))
        <div id="success-alert-container" class="position-fixed top-0 end-0 p-3 mt-5" style="z-index: 5">
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button id="close-success-btn" type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="error-alert-container" class="position-fixed top-0 end-0 p-3 mt-5" style="z-index: 5">
            <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button id="close-error-btn" type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // Function to handle hiding alerts after a specified time and closing alerts
        function handleAlert(alertId, timeout) {
            var alertContainer = $(alertId + '-container');
            var alert = $(alertId);

            // Hide the alert after the specified time
            setTimeout(function() {
                alert.fadeOut('slow', function() {
                    alertContainer.remove();
                });
            }, timeout);

            // Close the alert when the close button is clicked
            alert.find('.btn-close').click(function() {
                alert.fadeOut('slow', function() {
                    alertContainer.remove();
                });
            });
        }

        $(document).ready(function() {
            // Call the function for handling success alerts
            @if (session('success'))
                handleAlert('#success-alert', 5000);
            @endif

            // Call the function for handling error alerts
            @if (session('error'))
                handleAlert('#error-alert', 5000);
            @endif
        });
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            @auth
                <div>
                    <a href="/" class="text-decoration-none me-3"><i class="fas fa-home"></i></a>
                    {{-- @if (auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="text-decoration-none me-3"><i
                                class="fa fa-users"></i></a>
                    @endif --}}
                </div>
            @endauth

            <div>
                <a class="navbar-brand" href="/">{{ $title ?? 'Employee Management' }}</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth <!-- Check if the user is authenticated -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('edit.profile') }}">

                                <i class="fas fa-user"></i> Welcome, {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">



                        </li>
                        <li class="nav-item">
                            <form class="inline" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        {{ $slot }}
    </main>
    </div>


</body>
<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    &copy; {{ date('Y') }} Employee Management
</footer>

</html>
