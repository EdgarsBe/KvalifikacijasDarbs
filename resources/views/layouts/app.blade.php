<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BEAM') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/png" href="/images/Logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite('resources/css/app.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="max-h-[200vh] min-h-[100vh] bg-gradient-to-bl from-[#a4a4a4] from-0% to-[#fff] to-100%">
    <div id="app">
        <nav class="border-b-[0.5vh] border-gary-500 bg-gray-300 ">
            <div class="p-[1vh] flex justify-between items-center w-[92%] mx-auto">
                <ul>
                    <a href="{{ url('/') }}">
                        <img class="object-scale-down h-10 w-30" src="/images/LogoFullDark.png"></img>
                    </a>
                </ul>
                <ul class="pl-[3vw] flex items-center gap-[4vw]">
                    <li>
                        <a class="hover:text-[#868595] transition duration-300" href="#">Browse</a>
                    </li>
                    <li>
                        <a class="hover:text-[#868595] transition duration-300" href="#">Categories</a>
                    </li>
                    <li>
                        <a class="hover:text-[#868595] transition duration-300" href="#">News</a>
                    </li>
                    <li>
                        <a class="hover:text-[#868595] transition duration-300" href="#">About Us</a>
                    </li>
                </ul>
                <ul class="flex items-center gap-[0.2vw]">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="transition duration-500 text-black px-5 py-2 rounded-xl hover:bg-[#ebe0e6] active:bg-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="transition duration-500 bg-[#70a48a] text-white px-5 py-2 rounded-xl hover:bg-[#4dba84] active:bg-[#70a48a]" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                </ul>
                    @else
                <ul>
                    <li class="group hover:bg-[#ebe0e6] p-2 right-0">
                        Options
                            <ul class="absolute hidden group-hover:block bg-gray-200 p-2">
                                <li>
                                    <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <div>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                    </li>
                </ul>
                    @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
