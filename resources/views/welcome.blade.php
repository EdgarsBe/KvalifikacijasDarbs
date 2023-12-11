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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    </head>
    <body class="max-h-[200vh] min-h-[100vh] bg-primary-100 font-[Poppins]">
        <div>
            @if (Route::has('login'))
            <header class="border-b-[0.5vh] border-primary-300 bg-primary-400">
                <nav class="p-[1vh] flex justify-between items-center w-[92%] mx-auto">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                <img class="object-scale-down h-10 w-30" src="/images/LogoFullLight.png"></img>
                            </a>
                        </li>
                    </ul>
                    <ul class="flex items-center gap-[4vw]">
                        <li>
                            <a class="text-white hover:text-hover active:text-active transition duration-300" href="#">Browse</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-hover active:text-active transition duration-300" href="#">Categories</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-hover active:text-active transition duration-300" href="#">News</a>
                        </li>
                        <li>
                            <a class="text-white hover:text-hover active:text-active transition duration-300" href="#">About Us</a>
                        </li>
                    </ul>
                    @auth
                    <ul>
                        <li class="text-white hover:text-hover active:text-active">
                            <a href="{{ url('/MyProfile') }}">My Profile</a>
                        </li>
                    </ul>    
                        @else
                    <ul class="flex items-center gap-[0.2vw]">
                        <li>
                            <a class="transition duration-500 bg-primary-500 text-white px-5 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a class="transition duration-500 bg-primary-500 text-white px-5 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700" href="{{ route('register') }}">Register</a>
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
