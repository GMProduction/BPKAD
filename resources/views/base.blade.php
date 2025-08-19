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
                        <li>
                            <a href="{{ route('information.public') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Daftar Informasi Publik</a>
                        </li>
                        <li>
                            <a href="https://simonik.surakarta.go.id/"
                                class="block py-2 px-4 hover:bg-gray-100  ">Permohonan Informasi</a>
                        </li>
                        <li>
                            <a href="{{ route('information.dasarhukumppid') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Dasar Hukum PPID</a>
                        </li>
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
                        <li>
                            <a href="{{ route('information.public') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Daftar Informasi Publik</a>
                        </li>
                        <li>
                            <a href="https://simonik.surakarta.go.id/"
                                class="block py-2 px-4 hover:bg-gray-100  ">Permohonan Informasi</a>
                        </li>
                        <li>
                            <a href="{{ route('information.dasarhukumppid') }}"
                                class="block py-2 px-4 hover:bg-gray-100  ">Dasar Hukum PPID</a>
                        </li>
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
                    <div id="frameLocation"></div>


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
                        <a href="#" id="href_facebook" target="_blank" data-aos="fade-up"
                            class="mr-3 bg-white p-2 hover:bg-blue-600 font-semibold mb-3 text-white inline-flex items-center space-x-2 rounded transition duration-300">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>

                        <a href="#" id="href_twitter" target="_blank" data-aos="fade-up"
                            class="mr-3 bg-white hover:bg-teal-400 p-2 font-semibold mb-3 text-white inline-flex items-center space-x-2 rounded transition duration-300">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>

                        <a href="" id="href_instagram" target="_blank" data-aos="fade-up"
                            class="mr-3 bg-white hover:bg-purple-500 p-2 font-semibold mb-3 text-white inline-flex items-center space-x-2 rounded transition duration-300">
                            <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 256 256"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055">
                                    </path>
                                </g>
                            </svg>
                        </a>

                        <a href="#" id="href_youtube" target="_blank" data-aos="fade-up"
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
                        <p>Kunjungan Kemaren: {{ $yesterdayVisitors }}</p>
                        <p>Kunjungan Bulan Ini: {{ $thisMonthVisitors }}</p>
                        <p style="font-weight: bold">Total Kunjungan: {{ $totalVisitors }}</p>

                    </footer>

                </div>
            </div>
        </div>
        <div class="min-h-[75px] bgcolor2-primary flex items-center justify-center">
            <p class="h-full text-center text-white">@BPKAD Surakarta 2022</p>
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
