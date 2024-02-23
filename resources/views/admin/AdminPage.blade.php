<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEAM</title>

    <link rel="icon" type="image/png" href="/images/Logo.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
    <body class="w-full h-full min-h-[100vh] bg-primary-100 font-[Poppins] flex">
            <div class="w-1/6 sidebar sticky top-0 bottom-0
                p-2 w-[300px] overflow-y-auto text-center bg-primary-400 border-r-[0.3vw] border-primary-300 shadow h-screen">
                <div class="text-white text-xl">
                    <div class="p-2.5 mt-1 flex items-center rounded-md ">
                        <h1 class="text-[15px]  ml-3 text-xl text-white font-bold">Master Admin</h1>
                    </div>
                    <hr class="my-2 text-gray-600">

                    <div>
                        <a href="{{ url('/Admin') }}">
                            <div class="p-2.5 mt-2 flex rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary-600">
                                <span class="text-[15px] ml-4 text-white">Dashboard</span>
                            </div>
                        </a>
                        <a href="{{ url('/Admin/Products') }}">
                            <div class="p-2.5 mt-2 flex rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary-600">
                                <span class="text-[15px] ml-4 text-white">Products</span>
                            </div>
                        </a>
                        <a href="{{ url('/Admin/Users') }}">
                            <div class="p-2.5 mt-2 flex rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary-600">
                                <span class="text-[15px] ml-4 text-white">Users</span>
                            </div>
                        </a>
                        <a href="{{ url('/MyProfile') }}">
                            <div class="p-2.5 mt-2 flex rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary-600">
                                <span class="text-[15px] ml-4 text-white">Logout</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
    </body>
</html>
