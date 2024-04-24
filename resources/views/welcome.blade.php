<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BEAM</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="/images/Logo.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://c64c-85-254-74-243.ngrok-free.app/build/assets/app-569c8538.css">
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="max-h-[200vh] min-h-[100vh] bg-primary-100 font-[Poppins]">
        <div>
            @if (Route::has('login'))
            <header class="h-[9vh] border-b-[0.5vh] border-primary-300 bg-primary-400">
                <nav class="h-[9vh] p-[1vh] flex justify-between items-center w-[92%] mx-auto">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                <img class="object-scale-down h-10 w-30" src="/images/LogoFullLight.png"></img>
                            </a>
                        </li>
                    </ul>
                    <div id="nav-links" class="md:static absolute bg-primary-400 z-10 md:min-h-fit min-h-[35vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                        <ul class="pl-[3vw] flex md:flex-row flex-col md:items-center md:gap-[2vw] gap-[4vw]">
                            <li>
                                <a class="text-white hover:text-hover active:text-active transition duration-300" href="{{ url('/Browse') }}">Browse</a>
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
                            @if (\Illuminate\Support\Facades\Auth::check())
                            <li>
                                <div class="md:hidden flex text-white hover:text-hover active:text-active transition duration-300">
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
                            @else
                            <li>
                                <a class="md:hidden flex text-white hover:text-hover active:text-active transition duration-300" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="md:hidden flex text-white hover:text-hover active:text-active transition duration-300" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    @auth
                    <ul class="flex justify-between items-center gap-4
                    ">
                        <li class="text-white hover:text-hover active:text-active">
                            <a href="{{ url('/MyProfile') }}">My Profile</a>
                        </li>
                        <li class="flex items-center">
                            <ion-icon id="menuClick" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                        </li>
                        <li>
                            <div class="md:flex hidden text-white hover:text-hover active:text-active transition duration-300">
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
                        @else
                    <ul class="flex items-center gap-[0.2vw]">
                        <li class="md:visible invisible">
                            <a class="transition duration-500 bg-primary-500 text-white px-5 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="md:visible invisible">
                            <a class="transition duration-500 bg-primary-500 text-white px-5 py-2 rounded-xl hover:bg-primary-600 active:bg-primary-700" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="flex items-center">
                            <ion-icon id="menuClick" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                        </li>
                        @endif
                    </ul>
                @endauth
                </nav>
            </header>
            @endif
        </div>
    </body>
</html>
