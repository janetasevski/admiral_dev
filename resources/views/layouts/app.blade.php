<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Employee Management')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        nav {
            background-color: #007bff;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <nav>
        <div class="container">
            <a href="/">Home</a>
            <a href="/employees">Employee List</a>
            <a href="/employees/create">Create Employee</a>
            <a href="/cars/create">Create Cars</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
