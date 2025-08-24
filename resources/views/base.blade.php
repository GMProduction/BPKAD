<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BPKAD || Badan Pengelolaan Keuangan dan Aset Daerah Surakarta </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/appstyle/genosstailwind.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/import/aos-master/dist/aos.css') }}" type="text/css">

    {{-- <link rel="stylesheet"



    {{-- ICON --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Bootstrap JS (harus sebelum Summernote) -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    @yield('css')
</head>

<body class="font-poppins" style="position: relative">
    <style>
        iframe {
            width: 100%;
        }

        @media (min-width: 768px) {
            iframe {
                height: 300px;
                width: 500px;
            }
        }
    </style>
    <div class="nav-top">
        <a href="/" class=" z-10 logo-container">
            <img src="{{ asset('/assets/local/logosurakarta.png') }}" class="logo  " alt="Surakarta Logo">
            <img src="{{ asset('/assets/local/logobpkad.png') }}" class="logo  " alt="BPKAD Logo">
            <img src="{{ asset('/assets/local/berakhlak.png') }}" class="logo  " alt="Berakhlak Logo">
            <img src="{{ asset('/assets/local/bangga.png') }}" class="logo  " alt="Berakhlak Logo">
        </a>
        <a class="z-10 text">BPKAD KOTA SURAKARTA</a>
        <img src="{{ asset('assets/local/navtop.png') }}" class="img" />
    </div>

    <nav class="bg-transparent  sticky top-0 z-1 transition duration-300 z-10 shadow-sm " style="background: white">

        <div class="nav-view  nav-mobile">
            <p>BPKAD KOTA SURAKARTA</p>
            <button type="button" class="toggle-menu">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="mobile-menu" id="mobile-menu">
            <ul
                class="md:bg-transparent flex flex-col text-md p-4 bg-gray-50   border border-gray-100 md:flex-row md:space-x-8 md:mt-0 sm-text md:font-medium md:border-0    ">
                <li>
                    <a href="/"
                        class="menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto {{ request()->is('/') ? 'active' : '' }}">
                        Beranda
                    </a>

                </li>

                <li>
                    <button type="button"
                        class="menu dropdown-toggle flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium transition duration-300 md:text-zinc-200 rounded hover:bg-gray-400 md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto {{ request()->is('profil*') ? 'active' : '' }}">
                        Profil

                    </button>

                    <ul class="menu hidden py-1 text-md text-gray-700 absolute rounded-md bg-white duration-300 z-10">
                        <li><a href="/profil/visimisi" class="block py-2 px-4 hover:bg-gray-100">Visi & Misi</a></li>
                        <li><a href="/profil/struktur" class="block py-2 px-4 hover:bg-gray-100">Struktur Organisasi</a>
                        </li>
                        <li><a href="/profil/motto" class="block py-2 px-4 hover:bg-gray-100">Motto</a></li>
                        <li><a href="/profil/sk-pengelola-website" class="block py-2 px-4 hover:bg-gray-100">SK
                                Pengelola Website</a></li>
                    </ul>
                </li>


                <li class="group">
                    <button
                        class=" menu dropdown-toggle  flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto    {{ request()->is('layanan*') ? 'active' : '' }}    ">Layanan

                    </button>


                    <ul class="menu hidden py-1 text-md text-gray-700 absolute rounded-md bg-white duration-300 z-10">


                        <li>
                            <a href="{{ route('maklumat') }}" class="block py-2 px-4 hover:bg-gray-100  ">Maklumat
                                Pelayanan</a>
                        </li>
                        <li>
                            <a href="{{ route('sp') }}" class="block py-2 px-4 hover:bg-gray-100  ">Standar
                                Pelayanan</a>
                        </li>
                        <li>
                            <a href="{{ route('skm') }}" class="block py-2 px-4 hover:bg-gray-100  ">Survey
                                Kepuasan
                                Masyarakat</a>
                        </li>

                        <li>
                            <a href="https://sippn.menpan.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">
                                SIPPN</a>
                        </li>

                        <li>
                            <a href="{{ route('informasilayanan') }}" class="block py-2 px-4 hover:bg-gray-100  ">
                                Informasi Layanan</a>
                        </li>
                    </ul>

                </li>


                <li class="group">
                    <button
                        class=" menu flex dropdown-toggle  justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto    {{ request()->is('aduan*') ? 'active' : '' }}   ">Aduan

                    </button>


                    <ul class="menu hidden py-1 text-md text-gray-700 absolute rounded-md bg-white duration-300 z-10">


                        <li>
                            <a href="https://www.lapor.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">SP4N</a>
                        </li>
                        <li>
                            <a href="https://ulas.surakarta.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">ULAS</a>
                        </li>
                        <li>
                            <a href="https://wa.me/6281225067171" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">Lapor Mas Wali</a>
                        </li>
                        <li>
                            <a href="{{ route('skaduan') }}" class="block py-2 px-4 hover:bg-gray-100  ">SK
                                Pengelola
                                Aduan</a>
                        </li>

                        <li>
                            <a href="{{ route('grafikaduan') }}" class="block py-2 px-4 hover:bg-gray-100  ">
                                Grafik Aduan</a>
                        </li>
                    </ul>

                </li>


                <li class="group">
                    <button
                        class=" menu flex dropdown-toggle  justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto   {{ request()->is('bidang*') ? 'active' : '' }}  ">Bidang
                    </button>



                    <!-- Dropdown bidang -->

                    <ul class="menu hidden py-1 text-md text-gray-700 absolute rounded-md bg-white duration-300 z-10">
                        <li>
                            <a href="{{ route('sekretariat') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Sekretariat</a>
                        </li>
                        <li>
                            <a href="{{ route('anggaran') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Anggaran</a>
                        </li>
                        <li>
                            <a href="{{ route('perbendaharaan') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Perbendaharaan dan Akuntansi</a>
                        </li>
                        <li>
                            <a href="{{ route('aset') }}" class="block py-2 px-4 hover:bg-gray-100  ">Aset</a>
                        </li>
                        <li>
                            <a href="{{ route('uptd') }}" class="block py-2 px-4 hover:bg-gray-100  ">UPTD</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/artikel"
                        class=" menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto  {{ request()->is('artikel*') ? 'active' : '' }}  ">Artikel</a>
                </li>

                <li class="group">
                    <button id="dropdownNavbarLink"
                        class="nav-button dropdown-toggle  menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto   {{ request()->is('ppid*') ? 'active' : '' }}   ">PPID
                    </button>
                    <!-- Dropdown menu -->

                    <ul
                        class="py-1 text-md text-gray-700 absolute hidden  rounded-md group-hover:block bg-white  duration-300 z-10">
                        <li>
                            <a href="/ppid/informasi-berkala" class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Berkala</a>
                        </li>
                        <li>
                            <a href="{{ route('information.serta-merta') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Serta
                                Merta</a>
                        </li>
                        <li>
                            <a href="{{ route('information.setiap-saat') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Setiap
                                saat</a>
                        </li>
                        <li>
                            <a href="{{ route('information.di-kecualikan') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Dikecualikan</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('information.public') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Daftar Informasi Publik</a>
                        </li> --}}
                        <li>
                            <a href="https://simonik.surakarta.go.id/"
                                class="block py-2 px-4 hover:bg-gray-100  ">Permohonan Informasi</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('information.dasarhukumppid') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Dasar Hukum PPID</a>
                        </li> --}}
                        <li>
                            <a href="https://moniks.surakarta.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">SIMONIKS</a>
                        </li>
                    </ul>
                </li>

                <li class="group">
                    <button id="dropdownNavbarLink"
                        class=" menu dropdown-toggle  flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto  {{ request()->is('produk-hukum*') ? 'active' : '' }}  ">Produk
                        Hukum
                        /button>
                        <!-- Dropdown menu -->

                        <ul
                            class="py-1 text-md text-gray-700 absolute hidden  rounded-md group-hover:block bg-white  duration-300 z-10">
                            <li>
                                <a href="{{ route('produkhukumperda') }}"
                                    class="block py-2 px-4 hover:bg-gray-100  ">Produk Hukum
                                    Perda</a>
                            </li>
                            <li>
                                <a href="{{ route('produkhukumperwali') }}"
                                    class="block py-2 px-4 hover:bg-gray-100 ">Produk
                                    Hukum Perwali</a>
                            </li>
                        </ul>
                </li>

                <li>
                    <a href="{{ route('faq') }}"
                        class=" menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium  transition duration-300 d:text-zinc-200  rounded hover:bg-gray-400   md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto   {{ request()->is('faq*') ? 'active' : '' }}"
                        aria-current="page">FAQ</a>
                </li>
            </ul>


        </div>

        <div class="nav-view nav-desktop">
            <ul
                class="menu md:bg-transparent flex flex-col text-md p-4 mt-4 bg-gray-50  rounded-lg   md:flex-row md:space-x-8 md:mt-0 sm-text md:font-medium     ">
                <li>
                    <a href="/"
                        class="nav-button font-semibold pr-10 md:pr-3 md:pl-3 transition duration-300 {{ request()->is('/') ? 'active' : '' }}">
                        Beranda
                    </a>

                </li>

                <li class="group">
                    <a
                        class="nav-button font-semibold pr-10 md:pr-3 md:pl-3 transition duration-300   {{ request()->is('profil*') ? 'active' : '' }}">
                        <span>Profil</span>
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>



                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">

                        <li>
                            <a href="/profil/visimisi" class="block py-2 px-4 hover:bg-gray-100  ">Visi & Misi</a>
                        </li>
                        <li>
                            <a href="/profil/struktur" class="block py-2 px-4 hover:bg-gray-100  ">Struktur
                                Organisasi</a>
                        </li>
                        <li>
                            <a href="/profil/motto" class="block py-2 px-4 hover:bg-gray-100  ">Motto</a>
                        </li>
                        <li>
                            <a href="/profil/sk-pengelola-website" class="block py-2 px-4 hover:bg-gray-100  ">SK
                                Pengelola
                                Website</a>
                        </li>
                    </ul>
                </li>

                <li class="group">
                    <a
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300    {{ request()->is('layanan*') ? 'active' : '' }}    ">Layanan
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>


                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">


                        <li>
                            <a href="{{ route('maklumat') }}" class="block py-2 px-4 hover:bg-gray-100  ">Maklumat
                                Pelayanan</a>
                        </li>
                        <li>
                            <a href="{{ route('sp') }}" class="block py-2 px-4 hover:bg-gray-100  ">Standar
                                Pelayanan</a>
                        </li>
                        <li>
                            <a href="{{ route('skm') }}" class="block py-2 px-4 hover:bg-gray-100  ">Survey
                                Kepuasan
                                Masyarakat</a>
                        </li>

                        <li>
                            <a href="https://sippn.menpan.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">
                                SIPPN</a>
                        </li>

                        <li>
                            <a href="{{ route('informasilayanan') }}" class="block py-2 px-4 hover:bg-gray-100  ">
                                Informasi Layanan</a>
                        </li>
                    </ul>

                </li>


                <li class="group">
                    <a
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300    {{ request()->is('aduan*') ? 'active' : '' }}   ">Aduan
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>


                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">


                        <li>
                            <a href="https://www.lapor.go.id/" class="block py-2 px-4 hover:bg-gray-100  ">SP4N</a>
                        </li>
                        <li>
                            <a href="https://ulas.surakarta.go.id/"
                                class="block py-2 px-4 hover:bg-gray-100  ">ULAS</a>
                        </li>
                        <li>
                            <a href="https://wa.me/6281225067171" class="block py-2 px-4 hover:bg-gray-100  ">Lapor
                                Mas Wali</a>
                        </li>
                        <li>
                            <a href="{{ route('skaduan') }}" class="block py-2 px-4 hover:bg-gray-100  ">SK
                                Pengelola
                                Aduan</a>
                        </li>

                        <li>
                            <a href="{{ route('grafikaduan') }}" class="block py-2 px-4 hover:bg-gray-100  ">
                                Grafik Aduan</a>
                        </li>
                    </ul>

                </li>


                <li class="group">
                    <a
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300   {{ request()->is('bidang*') ? 'active' : '' }}  ">Bidang
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></a>



                    <!-- Dropdown bidang -->

                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">
                        <li>
                            <a href="{{ route('sekretariat') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Sekretariat</a>
                        </li>
                        <li>
                            <a href="{{ route('anggaran') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Anggaran</a>
                        </li>
                        <li>
                            <a href="{{ route('perbendaharaan') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Perbendaharaan dan Akuntansi</a>
                        </li>
                        <li>
                            <a href="{{ route('aset') }}" class="block py-2 px-4 hover:bg-gray-100  ">Aset</a>
                        </li>
                        <li>
                            <a href="{{ route('uptd') }}" class="block py-2 px-4 hover:bg-gray-100  ">UPTD</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/artikel"
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300  {{ request()->is('artikel*') ? 'active' : '' }}  ">Artikel</a>
                </li>

                <li class="group">
                    <a id="dropdownNavbarLink"
                        class="nav-button  menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium   {{ request()->is('ppid*') ? 'active' : '' }} md:text-zinc-200  rounded hover:bg-gray-400 transition duration-300  md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto      ">PPID
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></a>
                    <!-- Dropdown menu -->

                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">
                        <li>
                            <a href="/ppid/informasi-berkala" class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Berkala</a>
                        </li>
                        <li>
                            <a href="{{ route('information.serta-merta') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Serta
                                Merta</a>
                        </li>
                        <li>
                            <a href="{{ route('information.setiap-saat') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Setiap
                                saat</a>
                        </li>
                        <li>
                            <a href="{{ route('information.di-kecualikan') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Informasi
                                Dikecualikan</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('information.public') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Daftar Informasi Publik</a>
                        </li> --}}
                        <li>
                            <a href="https://simonik.surakarta.go.id/"
                                class="block py-2 px-4 hover:bg-gray-100  ">Permohonan Informasi</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('information.dasarhukumppid') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Dasar Hukum PPID</a>
                        </li> --}}
                        <li>
                            <a href="https://moniks.surakarta.go.id/" target="_blank"
                                class="block py-2 px-4 hover:bg-gray-100  ">SIMONIKS</a>
                        </li>
                    </ul>
                </li>

                <li class="group">
                    <a id="dropdownNavbarLink"
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300  {{ request()->is('produk-hukum*') ? 'active' : '' }}">Produk
                        Hukum
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></a>
                    <!-- Dropdown menu -->

                    <ul
                        class="menu py-1 text-md text-gray-700 absolute hidden rounded-md group-hover:block bg-white  duration-300">
                        <li>
                            <a href="{{ route('produkhukumperda') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Produk Hukum
                                Perda</a>
                        </li>
                        <li>
                            <a href="{{ route('produkhukumperwali') }}"
                                class="block py-2 px-4 hover:bg-gray-100 ">Produk
                                Hukum Perwali</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('faq') }}"
                        class="nav-button flex  font-semibold  pr-10   md:text-zinc-200 md:hover:text-orange-400 md:pr-3 md:pl-3  transition duration-300  {{ request()->is('faq*') ? 'active' : '' }}"
                        aria-current="page">FAQ</a>
                </li>
            </ul>


        </div>
    </nav>


    @yield('content')



    <footer class="">
        <div class=" min-h-[500px] bgcolor-primary sm:px-16 px-10 sm:pb-16 pb-10 sm:pt-10 pt-5">
            <div class="grid md:grid-cols-4 sd:grid-cols-3 grid-cols-2 gap-10">
                <div class="col-span-2">
                    <p class="text-xl text-white font-bold mb-6" data-aos="fade-up">
                        Sejarah Singkat</p>
                    <p class="text-white/80 text-md font-light mb-6 text-justify" data-aos="fade-up" id="short_his">
                    </p>

                    <p class="text-xl text-white font-bold mb-6" data-aos="fade-up">
                        Lokasi BPKAD</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0550613015275!2d110.8284683!3d-7.5689763999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a174d432153d7%3A0x83fb2dafaa28edb1!2sBPPKAD%20Aset%20Daerah%20Surakarta!5e0!3m2!1sen!2sid!4v1755619772389!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


                </div>
                <div>
                    <p class="text-xl text-white font-bold mb-6" data-aos="fade-up">
                        Contact</p>
                    <p class="text-white text-md font-bold italic" data-aos="fade-up">
                        Email</p>
                    <p class="text-white/80 text-md font-light mb-3 textEmail" data-aos="fade-up"></p>

                    <p class="text-white text-md font-bold italic" data-aos="fade-up">
                        Alamat</p>
                    <p class="text-white/80 text-md font-light mb-3 textAddress" data-aos="fade-up"></p>

                    <p class="text-white text-md font-bold italic" data-aos="fade-up">
                        Phone</p>
                    <p class="text-white/80 text-md font-light mb-3 textPhone" data-aos="fade-up"></p>

                    <p class="text-white text-md font-bold italic" data-aos="fade-up">
                        Jam Kerja</p>
                    <p class="text-white/80 text-md font-light textOfficeHours" style="white-space: pre-wrap;"
                        data-aos="fade-up"></p>
                </div>
                <div>
                    <p class="text-xl text-white font-bold mb-6" data-aos="fade-up">
                        Social Media</p>
                    <div class="flex flex-wrap">




                        <a href="https://www.instagram.com/bpkad.surakarta/" id="href_instagram" target="_blank"
                            data-aos="fade-up"
                            class="mr-3 bg-white hover:bg-purple-500 p-2 font-semibold mb-3 text-white inline-flex items-center space-x-2 rounded transition duration-300">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg">
                                <g fill="black" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="5" />
                                    <circle cx="12" cy="12" r="3.5" />
                                    <circle cx="17.5" cy="6.5" r="1.2" fill="currentColor"
                                        stroke="none" />
                                </g>
                            </svg>

                        </a>

                        <a href="https://www.youtube.com/channel/UCDZHy-Oso1XyJe1JH2pwclA" id="href_youtube"
                            target="_blank" data-aos="fade-up"
                            class="bg-white hover:bg-red-600 p-2 font-semibold text-white mb-3 inline-flex items-center space-x-2 rounded transition duration-300">
                            <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                            </svg>
                        </a>

                    </div>
                    <footer class="visitors mt-5">
                        <h2 style="color: white">Kunjungan website</h2>
                        <p>Kunjungan Hari Ini: {{ $todayVisitors }}</p>
                        <p>Kunjungan Kemarin: {{ $yesterdayVisitors }}</p>
                        <p>Kunjungan Bulan Ini: {{ $thisMonthVisitors }}</p>
                        <p style="font-weight: bold">Total Kunjungan: {{ $totalVisitors }}</p>

                    </footer>

                </div>
            </div>
        </div>
        <div class="min-h-[75px] bgcolor2-primary flex items-center justify-center">
            <p class="h-full text-center text-white">@BPKAD Surakarta 2025</p>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/gh/mickidum/acc_toolbar/acctoolbar/acctoolbar.min.js"></script>
    <script>
        window.onload = function() {
            window.micAccessTool = new MicAccessTool({
                buttonPosition: 'right', // default is 'left'
            });
        }
    </script>


    <script>
        "use strict"

        document.addEventListener("DOMContentLoaded", () => {
            contact_profile();
            short_history();
        });

        function short_history() {
            fetch('{{ route('home.setting.json') }}')
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById('short_his').innerHTML = data?.history
                })
        }

        function contact_profile() {
            fetch('{{ route('contact.profile.json') }}')
                .then((response) => response.json())
                .then((data) => {
                    document.querySelector('.textEmail').innerHTML = data?.email
                    document.querySelector('.textAddress').innerHTML = data?.address
                    document.querySelector('.textOfficeHours').innerHTML = data?.office_hours
                    document.querySelector('.textPhone').innerHTML = data?.phone
                    document.querySelector('#frameLocation').innerHTML = data?.location
                    document.querySelector('#href_facebook').href = data?.facebook
                    document.querySelector('#href_twitter').href = data?.twitter
                    document.querySelector('#href_instagram').href = data?.instagram
                    document.querySelector('#href_youtube').href = data?.youtube
                })
        }
    </script>

    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/nav.js') }}"></script>
    <script src="{{ asset('assets/import/aos-master/dist/aos.js') }}"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.querySelector(".toggle-menu");
            const targetMenu = document.getElementById("mobile-menu");

            toggleButton.addEventListener("click", function() {
                if (targetMenu.classList.contains("block")) {
                    targetMenu.classList.remove("block");
                    targetMenu.classList.add("hidden");

                } else {
                    targetMenu.classList.remove("hidden");
                    targetMenu.classList.add("block");
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const menu = this.nextElementSibling;

                    // Tutup semua menu lain jika ada yang terbuka
                    document.querySelectorAll('.dropdown-menu').forEach(el => {
                        if (el !== menu) el.classList.add('hidden');
                    });

                    // Toggle menu terkait
                    menu.classList.toggle('hidden');
                });
            });

            // Klik di luar dropdown, tutup semua
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown-toggle')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add(
                        'hidden'));
                }
            });
        });

        document.querySelectorAll('.berita-utama__content p').forEach(p => {
            const children = Array.from(p.childNodes);

            const onlyAllowed = children.every(child => {
                return (
                    (child.nodeType === 1 && (child.tagName === 'IMG' || child.tagName === 'BR')) ||
                    // <img> atau <br>
                    (child.nodeType === 3 && child.textContent.trim() === '') // text node kosong
                );
            });

            if (onlyAllowed) {
                p.style.display = 'none';
            }
        });
    </script>



    @yield('morejs')

    <script>
        AOS.init();
    </script>
</body>

</html>
