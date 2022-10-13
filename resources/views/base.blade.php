<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BPKAD || Badan Pengelolaan Keuangan dan Aset Daerah Surakarta </title>
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

<body style="position: relative">



    <nav class="bg-transparent  sticky top-0 z-1 h-[89px]">
        <div class="container flex flex-wrap justify-between items-center mx-auto sticky top-0">
            <a href="#" class="flex items-center">
                <img src="{{ asset('/assets/local/logosurakarta.png') }}" class="mr-3 sm:w-[77px] h-10 sm:h-[89px] "
                    alt="Surakarta Logo">
                {{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BPKAD</span> --}}
            </a>
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex justify-center items-center ml-3 text-white rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul
                    class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block font-semibold py-2 pr-10 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3  md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page">Beranda</a>
                    </li>

                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700  md:text-zinc-200  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Bidang
                            <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 110px);">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Artikel</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">PPID</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="mt-[-89px] h-[796px] w-[100%] bg-black/50 z-[-1]  relative">
        <div class="absolute bottom-[200px] z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-red-600 text-4xl">BKPAD </a> <a class="font-bold text-4xl text-white">KOTA
                SURAKARTA</a> <br>
            <a class="font-bold text-white">Badan Pengelolaan Keuangan & Aset Daerah Kota Surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%] h-[796px] object-cover top-0 left-0"
        src="{{ asset('assets/local/slide.png') }}" />


    <div class="mt-[-70px] min-h-[150px] w-[90%] mx-[auto] rounded-md bg-white shadow-md">
        <div class="grid grid-cols-4 gap-4">
            <div class="flex">
                <span class="material-symbols-outlined">
                    mail
                </span>
                <span>Email</span>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        @yield('content')
    </div>




    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <img class="logo" src="{{ asset('images/local/logo-perusahaan.png') }}" />
                    <p class="keterangan">Jasa Internasional Forwarding, Kargo serta Logistik terpercaya di
                        Indonesia. Melayani lebih dari ratusan pelanggan dengan berbagai macam tujuan populer
                        internasional seperti China, Singapura, Malaysia, Eropa, Amerika dan Australia.</p>
                    <p class="keterangan">Kami berkomitmen untuk memberikan layanan dengan harga terbaik dan
                        transparan serta konsultasi pengirman kargo dan Project Handling.</p>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="judul">Kontak Kami</p>
                    <div class="d-flex mb-3">
                        <i class="material-icons menu-icon me-3">home</i>
                        <div>
                            <p class="info">Jl. Gatot Subroto
                                Kawasan Industri Candi
                                Blok K No 7
                                Kavling 1
                                Purwoyoso
                                Semarang
                                50184</p>
                        </div>


                    </div>

                    <div class="d-flex mb-3">
                        <i class="material-icons menu-icon me-3">schedule</i>
                        <div>
                            <p class="info fw-bold">Buka Jam</p>
                            <p class="info">09.00 - 17.00</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <i class="material-icons menu-icon me-3">mail</i>
                        <div>
                            <p class="info">rsx.srg@gmail.com</p>

                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <i class="material-icons menu-icon me-3">call</i>
                        <div>
                            <p class="info">+62 823-3233-5533</p>
                            <p class="info">+62 813-9129-1127</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="judul">Navigasi</p>
                    <a class="navigasi">Layanan Kami</a>
                    <a class="navigasi">Tentang Kami</a>
                    <a class="navigasi">Hubungi Kami</a>
                    <a class="navigasi">Karir</a>
                    <a class="navigasi">Berita</a>
                    <a class="navigasi">Pricing</a>
                    <a class="navigasi">Cek Resi</a>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <p class="judul">Tetap Terkoneksi</p>
                    <a href="https://www.facebook.com/pages/category/Product-Service/SUKMATRIP-794165044301310/">
                        <i class="fa fa-facebook-square fa-lg facebookbutton"></i></a>
                    <a href="https://www.instagram.com/sukmatrip_/"> <i
                            class="fa fa-instagram  fa-lg instagrambutton"></i></a>
                </div>
            </div>



        </div>
    </footer>

    <div class="d-flex bottom-footer justify-content-center align-items-center">
        <p style="color: white;" class="mt-4 f08">2022 - All rights reserved
            to
            ©RadjasulaimanExpress
        </p>
    </div>




    <script src="{{ asset('/js/flowbite.js') }}"></script>

    @yield('morejs')
</body>

</html>
