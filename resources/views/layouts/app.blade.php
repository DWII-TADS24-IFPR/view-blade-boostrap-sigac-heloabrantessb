<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <title>@yield('title', 'SIGAC')</title>
</head>

<body class="vh-100 d-flex flex-column">
    @include('layouts.navbar')

    <div class="container p-4">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>

</html>
