<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

       
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

     
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50 font-sans antialiased">
     
        <nav class="bg-white shadow-md p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="http://127.0.0.1:8000/" class="text-2xl font-bold text-gray-800">SongStation</a>
                <div class="space-x-4">
                    @auth
                        
                        <a href="{{ url('/dashboard') }}" class="text-gray-800 hover:text-red-600 transition duration-300">Dashboard</a>
                       
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                       
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-red-600 transition duration-300">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-800 hover:text-red-600 transition duration-300">Register</a>
                    @endauth
                </div>
            </div>
        </nav>

     
        <div class="container mx-auto mt-8">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>
