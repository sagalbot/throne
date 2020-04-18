<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GitLab Seats</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="flex flex-col min-h-screen justify-center items-center">

    <h1>Hello!</h1>

    @dd(auth()->user()->toArray())

</body>
</html>
