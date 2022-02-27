<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Weight It</title>
    <base href="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="w-full flex flex-row justify-between mb-3 bg-blue-600 py-4 pl-2">
    <div class="flex flex-row items-center">
        <h1 class="text-3xl text-white underline"><a href="/">Weight It</a></h1>
        <a class="bg-blue-500 px-3 py-1 mx-3 rounded text-white hover:bg-blue-400" href="/">Home</a>
        <a class="bg-blue-500 px-3 py-1 rounded text-white hover:bg-blue-400" href="{{ route('barbellcalc.index') }}">Barbell Calculator</a>
    </div>
    <div class="flex flex-row pr-3 items-center">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-blue-500 px-3 py-1 mx-3 rounded text-white hover:bg-blue-400" type="submit">Logout</button>
            </form>
        @endauth
        @guest
            <a class="bg-blue-500 px-3 py-1 mx-3 rounded text-white hover:bg-blue-400" href="{{ route('login') }}">Login</a>
        @endguest

    </div>
</nav>
@yield('body')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
