<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BPKAD || Admin Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/appstyle/genosstailwind.css') }}" type="text/css">

    {{-- <link rel="stylesheet"



    {{-- ICON --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="relative">

    <nav class="h-[70px] bg-white  top-0 w-full shadow-sm z-20 fixed">
        <div class="px-[24px] relative h-full flex items-center z-20 justify-between">

            <div class=" h-full flex items-center">
                <span
                    class="material-symbols-outlined cursor-pointer rounded-full p-2 hover:bg-black/10 transition duration-300">
                    menu
                </span>

                <img src="{{ asset('/assets/local/logosurakarta.png') }}" class="logo   h-10   " alt="Surakarta Logo">

                <p class="text-xl font-bold">BPKAD SURAKARTA</p>
            </div>

            <div class=" h-full flex items-center">
                <button type="button" id="dropdownDefault" data-dropdown-toggle="dropdown"
                    class="block w-[35px] h-[35px] rounded-full bg-black/10 cursor-pointer overflow-hidden">
                    <img src="{{ asset('/assets/local/profile.png') }}" class="logo   h-full w-full   "
                        alt="Surakarta Logo">
                </button>


                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-600 ">Sign
                                out</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>

    <div class="bg-white shadow-sm w-[225px] h-full fixed top-0 left-0 ">
        <div class="h-[70px]"></div>
        <div class="p-3 py-5">
            <a class="item ">
                <span class="material-symbols-outlined mr-2">
                    dashboard
                    </span>
                <p class="title-menu block">Dashboard</p>
            </a>

            <a class="item ">
                <span class="material-symbols-outlined mr-2">
                    dashboard
                    </span>
                <p class="title-menu block">Dashboard</p>
            </a>

            <a class="item ">
                <span class="material-symbols-outlined mr-2">
                    dashboard
                    </span>
                <p class="title-menu block">Dashboard</p>
            </a>

            <a class="item ">
                <span class="material-symbols-outlined mr-2">
                    dashboard
                    </span>
                <p class="title-menu block">Dashboard</p>
            </a>
        </div>


    </div>

    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/nav.js') }}"></script>

    @yield('morejs')
</body>

</html>
