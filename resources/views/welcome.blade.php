<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>BEAM</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="/images/Logo.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
           
        </style>
    </head>
    <body class="max-h-[200vh] min-h-[100vh] bg-gradient-to-bl from-[#a4a4a4] from-0% to-[#fff] to-100%">
        <div>
            @if (Route::has('login'))
            <header class="border-b-[0.5vh] border-gary-500 bg-gray-300">
                <nav class="p-[1vh] flex justify-between items-center w-[92%] mx-auto">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                <img class="object-scale-down h-10 w-30" src="/images/LogoFullDark.png"></img>
                            </a>
                        </li>
                    </ul>
                    <ul class="flex items-center gap-[4vw]">
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
                    @auth
                    <ul>
                        <li>
                            <a href="{{ url('/MyProfile') }}">My Profile</a>
                        </li>
                    </ul>    
                        @else
                    <ul class="flex items-center gap-[0.2vw]">
                        <li>
                            <a class="transition duration-500 text-black px-5 py-2 rounded-xl hover:bg-[#ebe0e6] active:bg-white" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a class="transition duration-500 bg-[#70a48a] text-white px-5 py-2 rounded-xl hover:bg-[#4dba84] active:bg-[#70a48a]" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                    @endif
                @endauth
                </nav>
            </header>
            @endif
        </div>
    </body>
</html>
