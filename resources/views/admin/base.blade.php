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

    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>


    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    {{-- ADMIN GENOSSTYLE --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/appstyle/admin-genosstyle.css') }}" type="text/css">


    {{-- ICON --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('css')
</head>

<div class="d-flex admin ">
    <div class="sidebar">
        <div class="logo-container">
            <img class="company-logos" src="{{ asset('assets/local/logobpkad.png') }}" />
            <img class="company-logos-minimize" src="{{ asset('assets/local/logobpkad.png') }}" />
        </div>
        <div class="menu-container">

            <ul>
                <li>
                    <a class="menu {{ Request::is('admin/kustomisasi') ? 'active' : '' }} tooltip"
                        href="/admin/kustomisasi-slider">
                        <span class="material-symbols-outlined">
                            settings
                        </span>
                        <span class="text-menu"> Custom Website</span>
                        <span class="tooltiptext">Custom Website</span>

                    </a>
                </li>

                <li>
                    <a class="menu  nav-link" href="/admin/informasi">
                        <span class="material-symbols-outlined mr-2 menu-icon">
                            info
                        </span>
                        <span class="text-menu">Information</span>
                        <span class="tooltiptext">Information</span>
                    </a>
                </li>
                <li>
                    <a class="menu nav-link" href="/admin/artikel">
                        <span class="material-symbols-outlined mr-2 menu-icon">
                            feed
                        </span>
                        <span class="text-menu"> Artikel</span>
                        <span class="tooltiptext">Artikel/span>
                    </a>
                </li>
            </ul>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="gen-body">
        <div class="gen-nav">
            <div class="start">
                <a class="nav-button">
                    <span class="iconfwd material-symbols-outlined">
                        arrow_forward
                    </span>
                    <span class="iconback material-symbols-outlined">
                        arrow_back
                    </span>
                </a>


            </div>

            <div class="end">

                <div class="dropdown">
                    <div class="profile-button">
                        <div class="content">

                            <a id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/local/account.jpg') }}" />
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <p class="user">User</p>
                                <p class="email">user@gmail.com</p>
                                <hr>
                                <a class="logout" href="/logout">Logout</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="gen-content">
            @yield('content')
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="{{ asset('js/admin-genosstyle.js') }}"></script>
{{-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> --}}

@yield('morejs')
</body>

</html>
