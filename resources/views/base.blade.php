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



    <nav class="genosnav bg-transparent  sticky top-0 z-1 h-[89px] transition duration-300 z-10 shadow-sm">
        <div class="container flex flex-wrap justify-between items-center mx-auto sticky top-0">
            <a href="#" class="flex items-center">
                <img src="{{ asset('/assets/local/logosurakarta.png') }}" class="logo mr-3  h-16 m-3 sm:m-0 sm:h-[80px] "
                    alt="Surakarta Logo">
                {{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BPKAD</span> --}}
            </a>
            <button data-collapse-toggle="mobile-menu" type="button"
                class="tombol-mobile inline-flex justify-center items-center m-5 text-white rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500"
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
                            class="block font-semibold py-2 pr-10 pl-3 menu active text-white bg-blue-700 rounded md:bg-transparent md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 "
                            aria-current="page">Beranda</a>
                    </li>

                    <li>
                        <a href="#"
                            class="menu block py-2 pr-4 pl-3  text-gray-200 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="menu flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-200  md:text-zinc-200  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:pr-3 md:pl-3 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Bidang
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
                            class="menu block py-2 pr-4 pl-3 text-gray-200 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Artikel</a>
                    </li>
                    <li>
                        <a href="#"
                            class="menu block py-2 pr-4 pl-3 text-gray-200 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:text-zinc-200 md:hover:text-white md:pr-3 md:pl-3 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">PPID</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="mt-[-89px] h-[796px] w-[100%] bg-black/50 z-[-1]  relative">
        <div class="absolute bottom-[200px] z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-red-600 text-4xl">BPKAD </a> <a class="font-bold text-4xl text-white">KOTA
                SURAKARTA</a> <br>
            <a class="font-bold text-white">Badan Pengelolaan Keuangan & Aset Daerah Kota Surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%] h-[796px] object-cover top-0 left-0"
        src="{{ asset('assets/local/slide.png') }}" />


    <div class="mt-[-70px] min-h-[150px] w-[90%] mx-[auto] rounded-md bg-white shadow-md flex items-center ">
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-[auto] mb-[auto] w-[100%]">
            <div class="flex  md:justify-center justify-start  sm:mx-0 mx-5 sm:my-0 my-1 sm:mt-0 mt-3">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    mail
                </span>
                <div>
                    <p class="text-primary font-bold italic">Email</p>
                    <p>bpkad@surakarta.go.id</p>
                </div>
            </div>

            <div class="flex  md:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    location_on
                </span>
                <div>
                    <p class="text-primary font-bold italic">Alamat</p>
                    <p>Jl. Jend Sudirman No. 2 ,
                        Kompleks Balaikota Surakarta</p>
                </div>
            </div>

            <div class="flex  jmd:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    call
                </span>
                <div>
                    <p class="text-primary font-bold italic">Phone</p>
                    <p>(0271) 642020</p>
                </div>
            </div>

            <div class="flex  md:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1 sm:mb-0 mb-3">
                <span class="material-symbols-outlined font-bold  text-primary mr-2 ">
                    schedule
                </span>
                <div>
                    <p class="text-primary font-bold italic">Jam Kerja</p>
                    <p>Senin-Kamis 07.15-16.00 WIB</p>
                    <p>Jumat 07.00-11.30 WIB</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container grid sm:grid-cols-5 grid-cols-1 gap-4 mt-16 mb-6">
        <div class="col-span-2">
            <img src="{{ asset('assets/local/mantab_no_korupsi.png') }}" class="w-[40%] m-auto" />
        </div>
        <div class="col-span-3 sm:mx-0 mx-5">
            <p class="text-primary font-bold text-3xl italic mb-3">Apa sih BPKAD Surakarta?</p>
            <p class="text-sm">Badan Pengelolaan Keuangan dan Aset Daerah Kota Surakarta merupakan unsur pelaksana
                fungsi penunjang urusan Pemerintahan Bidang Keuangan, Sub Pengelolaan Keuangan dan Aset Daerah yang
                menjadi kewenangan Pemerintahan Daerah yang dipimpin oleh Kepala Badan Pengelolaan Keuangan dan Aset
                Daerah sesuai dengan Peraturan Walikota Surakarta Nomor 25.2 Tahun 2021 Tentang Kedudukan, Susunan
                Organisasi, Tugas dan Fungsi serta Tata Kerja Badan Daerah</p>
        </div>
    </div>

    <div class="bg-primary mt-16 w-[100%] py-10 sm:px-10 px-5">
        <p class="text-white font-bold text-3xl italic mb-3 text-center">Aplikasi Online</p>
        <p class="text-white/80 text-sm text-center mb-10">Aplikasi Online yang dapat membantumu</p>

        <div class="grid grid-cols-1 sm:grid-cols-2  container sm:gap-16 gap-5 m-auto">
            <div
                class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-3 p-5 transition duration-150 cursor-pointer">
                <div>
                    <img src="{{ asset('assets/local/simdang.png') }}" class="w-[80%] m-auto" />
                </div>
                <div class="col-span-2">
                    <p class="text-white font-bold text-2xl italic mb-3">APLIKASI FMIS</p>
                    <p class="text-sm text-white/80 ">Financial Management Information System (FMIS) dikembangkan dari basis SIMDA untuk mempermudah manajemen keuangan daerah pada Pemerintah Kota Surakarta.</p>
                </div>

            </div>

            <div
                class="rounded-md w-[100%]  bg-white/25 hover:bg-white/50 grid grid-cols-3 p-5 transition duration-150 cursor-pointer">
                <div>
                    <img src="{{ asset('assets/local/hibah-online.png') }}" class="w-[80%] m-auto" />
                </div>
                <div class="col-span-2">
                    <p class="text-white font-bold text-2xl italic mb-3">Aplikasi HIBAH ONLINE</p>
                    <p class="text-sm text-white/80 ">APLIKASI HIBAH BANSOS DAN BANKEU
                        PEMERINTAH SURAKARTA, JAWA TENGAH
                        Badan Pendapatan Pengelolaan Keuangan dan Aset Daerah</p>
                </div>

            </div>

            <div
                class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-3 p-5 transition duration-150 cursor-pointer">
                <div>
                    <img src="{{ asset('assets/local/sinta.png') }}" class="w-[80%] m-auto" />
                </div>
                <div class="col-span-2">
                    <p class="text-white font-bold text-2xl italic mb-3">APLIKASI SINTA</p>
                    <p class="text-sm text-white/80 ">Sistem Informasi Tanah Pemerintah Kota Surakarta</p>
                </div>

            </div>

            <a class="block " href="https://bppkad.surakarta.go.id/sikendis/" target="_blank">
            <div
                class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-3 p-5 transition duration-150 cursor-pointer">
                <div>
                    <img src="{{ asset('assets/local/sikendis.png') }}" class="w-[80%] m-auto" />
                </div>
                <div class="col-span-2">
                    <p class="text-white font-bold text-2xl italic mb-3">APLIKASI SINKENDIS</p>
                    <p class="text-sm text-white/80 ">(Sistem Informasi Kendaraan Dinas)
                        Pemerintah Kota Surakarta</p>
                </div>

            </div>
        </a>
        </div>

    </div>

    <div class=" mt-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Informasi Berkala</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto">Informasi yang wajib di perbaharui kemudian disediakan dan
            diumumkan kepada
            publik secara berkala sekurang-kurangnya setiap 6 bulan sekali</p>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 sm:m-10 m-5">
            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    info
                </span>
                <span class="font-bold">Informasi Tentang Profil Badan Public</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    history_edu
                </span>
                <span class="font-bold">Ringkasan Program dan Kegiatan yang sedang dijalankan</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    request_quote
                </span>
                <span class="font-bold">Ringkasan Laporan Keuangan</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    inventory_2
                </span>
                <span class="font-bold">Informasi Pengadaan Barang dan Jasa </span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    local_police
                </span>
                <span class="font-bold">Informasi Tentang Peraturan Keputusan atau Kebijakan yang mengikat</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    warning
                </span>
                <span class="font-bold">Informasi tentang prosedur peringatan dini dan prosedur evakuasi keadaan
                    darurat</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    work
                </span>
                <span class="font-bold">Ringkasan Informasi Tentang Kinerja</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    dangerous
                </span>
                <span class="font-bold">Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau
                    Pelanggaran</span>
            </div>


        </div>
    </div>

    <div class="grid md:grid-cols-2 grid-cols-1 md:h-[750px] h-min-[750px] relative overflow-hidden">
        <div class="relative">
            <div class="absolute bg-black/60 top-0 left-0 w-[100%] h-[100%]"></div>
            <img src="{{ asset('assets/local/talk.jpg') }}" class="absolute z-[-1] object-cover h-full" />

            <div class="absolute bottom-16 left-10 ">
                <p class="italic font-bold text-4xl text-white mb-3">Kirim Aspirasi Anda</p>
                <p class=" text-white">Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik</p>
            </div>
        </div>
        <div class="bg-primary sm:p-16 p-5 py-10 sm:py-16">
            <div class="block md:hidden">
                <p class="italic font-bold sm:text-4xl text-2xl text-white mb-3">Kirim Aspirasi Anda</p>
                <p class=" text-white/80 sm:text-md text-sm mb-6">Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik</p>
            </div>
            <form>
                <div class="mb-6">
                    <label for="aspirasi-nama"
                        class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Nama</label>
                    <input type="text" id="aspirasi-nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Nama Anda" required>
                </div>

                <div class="mb-6">
                    <label for="aspirasi-alamat"
                        class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Alamat</label>
                    <input type="text" id="aspirasi-alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Alamat Anda" required>
                </div>

                <div class="mb-6">
                    <label for="aspirasi-nohp"
                        class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Nomor Hp</label>
                    <input type="text" id="aspirasi-nohp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Nomor Hp Anda" required>
                </div>

                <div class="mb-6">
                    <label for="aspirasi-text"
                        class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Masukan Aspirasi</label>
                    <textarea type="text" id="aspirasi-text" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Aspirasi anda" required></textarea>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-white" for="user_avatar">Upload file</label>
                    <input
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <div class="mt-1 text-sm text-white" id="user_avatar_help">Masukan Gambar / Foto jika diperlukan
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg w-full h-[75px] px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold text-2xl">Kirim</button>
            </form>
        </div>
    </div>


    <div class=" mt-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Artikel</p>
        <p class="text-sm text-center w-[50%] mx-auto">Artikel terbaru dari kami</p>


        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 sm:p-16 p-5 ">
            <div class="mb-10">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://cdn-2.tstatic.net/jateng/foto/bank/images/kericuhan-di-rutan-solo-kamis-1012019.jpg" />

                </div>
                <p class="italic font-bold text-md text-center">Pemerintah Kota Surakarta Meraih Opini WTP ke-12 Secara berturut
                </p>
            </div>

            <div class="mb-10">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/Wz555Tw9E7BzYVE3_UgSwYYk4KM=/0x0:780x520/750x500/data/photo/2019/09/16/5d7f65d83d0b9.jpg" />

                </div>
                <p class="italic font-bold text-md text-center">Perbedaan Solo, Surakarta, Kartasura, dan Solo Baru, Ini Sejarahnya
                </p>
            </div>

            <div class="mb-10">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

                </div>
                <p class="italic font-bold text-md text-center">Tari Gambyong: Gerakan, Pola Lantai, Properti, Iringan, dan Maknanya
                </p>
            </div>

            <div class="mb-10">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/3lNrjcur7miM2mLmWyfwUlC5Oq0=/0x0:0x0/750x500/data/photo/2021/10/11/6164296e46e4f.jpg" />

                </div>
                <p class="italic font-bold text-md text-center">Mengenal Bedhaya Ketawang, Tarian Sakral dari Keraton Surakarta
                </p>
            </div>


        </div>
    </div>

    <footer class="">
        <div class=" min-h-[500px] bg-primary p-16 ">
            <div class="grid md:grid-cols-4 sd:grid-cols-3 grid-cols-2 gap-10">
                <div class="col-span-2">
                    <p class="text-xl text-white font-bold mb-6">Sejarah Singkat</p>
                    <p class="text-white/80 text-sm font-light ">Badan Pengelolaan Keuangan dan Aset Daerah Kota
                        Surakarta merupakan unsur pelaksana fungsi penunjang urusan Pemerintahan Bidang Keuangan, Sub
                        Pengelolaan Keuangan dan Aset Daerah yang menjadi kewenangan Pemerintahan Daerah yang dipimpin
                        oleh Kepala Badan Pengelolaan Keuangan dan Aset Daerah sesuai dengan Peraturan Walikota
                        Surakarta Nomor 25.2 Tahun 2021 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta
                        Tata Kerja Badan Daerah</p>
                </div>
                <div>
                    <p class="text-xl text-white font-bold mb-6">Contact</p>
                    <p class="text-white text-sm font-bold italic">Email</p>
                    <p class="text-white/80 text-sm font-light mb-3">bpkad@surakarta.go.id</p>

                    <p class="text-white text-sm font-bold italic">Alamat</p>
                    <p class="text-white/80 text-sm font-light mb-3">Jl. Jend Sudirman No. 2, Kompleks Balaikota
                        Surakarta</p>

                    <p class="text-white text-sm font-bold italic">Phone</p>
                    <p class="text-white/80 text-sm font-light mb-3">(0271) 642 020</p>

                    <p class="text-white text-sm font-bold italic">Jam Kerja</p>
                    <p class="text-white/80 text-sm font-light">Senin - Kamis 07.15-16.00 WIB</p>
                    <p class="text-white/80 text-sm font-light mb-3">Jumat 07.00-11.30 WIB</p>
                </div>
                <div>
                    <p class="text-xl text-white font-bold mb-6">Social Media</p>
                    <div class="flex">
                        <button
                            class="mr-3 bg-white p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </button>

                        <button
                            class="mr-3 bg-white p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </button>

                        <button
                            class="bg-white p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                            <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 256 256"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-[75px] bg-primary flex items-center justify-center">
            <p class="h-full text-center text-white">@BPKAD Surakarta 2022</p>
        </div>
    </footer>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/nav.js') }}"></script>

    @yield('morejs')
</body>

</html>
