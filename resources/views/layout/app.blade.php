<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $pageTitle ?? 'Blogger' }}</title>
    <script src="https://kit.fontawesome.com/3182d6ec23.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body>

    @yield('content')
</body>

</html>
