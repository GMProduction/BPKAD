<!DOCTYPE html>

<head>
    @yield('head')
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

<body class="relative min-h-screen">

    <nav class="h-[70px] bg-white  top-0 w-full shadow-sm z-20 fixed">
        <div class="px-[24px] relative h-full flex items-center z-20 justify-between">

            <div class=" h-full flex items-center">
                <a onclick="openNav()"><span
                        class="material-symbols-outlined cursor-pointer rounded-full p-2 hover:bg-black/10 transition duration-300">
                        menu
                    </span></a>

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
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow ">
                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownDefault">

                        <li>
                            <a href="{{ route('logout') }}"
                                class="block py-2 px-4 hover:bg-gray-100  text-red-600 ">Sign
                                out</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>

    <div class="flex h-full">
        <div id="sidebar" class="bg-white shadow-sm h-full fixed top-0 left-0 sidebar">
            <div class="min-h-[70px]"></div>
            <div class="p-3 py-5">

                <a class="menu nav-link" onclick="dropdown()">
                    <span class="material-symbols-outlined mr-2 menu-icon">
                        settings
                    </span>
                    <div class="flex justify-between w-full">
                        <p class="title-menu block menu-text">Customize</p>
                        <span id="arrow" class="material-symbols-outlined mr-2 menu-icon">
                            expand_more

                        </span>
                    </div>

                </a>

                <div id="submenu" class="transition">
                    <a class="menu  nav-link " href="{{ route('customize.slider') }}">
                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text text-sm">Slider </p>
                    </a>
                    <a class="menu  nav-link " href="{{ route('customize.home') }}">
                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text text-sm">Sejarah </p>
                    </a>
                    <a class="menu nav-link" href="{{ route('customize.profile') }}">

                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text ext-sm">Profil </p>
                    </a>
                    <a class="menu" href="{{ route('customize.bidang') }}">

                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text ext-sm">Bidang </p>
                    </a>
                    <a class="menu" href="{{ route('customize.aplikasi.online') }}">

                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text ext-sm">Aplikasi Online</p>
                    </a>
                    <a class="menu" href="{{ route('customize.contact.profile') }}">

                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text ext-sm">Kontak Profil</p>
                    </a>
                    <a class="menu" href="{{ route('customize.youtube') }}">

                        <span class="material-symbols-outlined mr-2 menu-icon">
                            fiber_manual_record
                        </span>
                        <p class="title-menu block nav-link menu-text ext-sm">Video Yotube</p>
                    </a>
                </div>


                <a class="menu  nav-link" href="/admin/informasi">
                    <span class="material-symbols-outlined mr-2 menu-icon">
                        info
                    </span>
                    <p class="title-menu block menu-text">Information</p>
                </a>

                <a class="menu nav-link" href="/admin/artikel">
                    <span class="material-symbols-outlined mr-2 menu-icon">
                        feed
                    </span>
                    <p class="title-menu block menu-text">Artikel</p>
                </a>
            </div>


        </div>

        {{-- CONTENT --}}
        <div class="w-full">
            <div class="h-[70px]">

            </div>

            <div class="flex " style="min-height: calc(100vh - 70px)" >
                <div class="side">

                </div>
                <div class="flex-1">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }

        dropdown();
    </script>
    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/admin/nav.js') }}"></script>
    {{-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> --}}

    @yield('morejs')
</body>

</html>
