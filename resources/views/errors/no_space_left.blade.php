<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you have a CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .error-container h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .error-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .error-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .error-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>We'll be back soon!</h1>
    <p>Sorry for the inconvenience but we're performing some maintenance at the moment. We'll be back online shortly!</p>
</body>
</html>