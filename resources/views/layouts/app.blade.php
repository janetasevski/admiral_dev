<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Employee Management')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        nav {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>

    <nav>
        <a href="/">Home</a>
        <a href="/employees">Employee List</a>
        <a href="/employees/create">Create Employee</a>
    </nav>

    <div>
        @yield('content')
    </div>

</body>

</html>
