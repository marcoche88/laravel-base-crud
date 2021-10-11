<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>DC Comics | @yield('title')</title>
</head>
<body>
    {{-- header con i dati del config main_menu --}}
    @include('includes.header', ['links' => config('main_menu')])

    {{-- jumbotron --}}
    <section class="jumbotron"></section>

    {{-- main content --}}
    <main>
        @yield('content')
    </main>

    {{-- footer --}}
    @include('includes.footer')
</body>
</html>