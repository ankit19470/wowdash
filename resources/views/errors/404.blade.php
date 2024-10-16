<!-- resources/views/errors/404.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional: Include your CSS -->
</head>
<body>
    <div style="text-align: center; padding: 50px;">
        <h1 style="font-size: 50px;">404</h1>
        <h2>Page Not Found</h2>
        <p>Sorry, the page you are looking for does not exist.</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>
</body>
</html>
