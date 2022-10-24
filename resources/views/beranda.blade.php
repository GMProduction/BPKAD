@extends('base')

@section('content')

<div class="mt-[-89px] sm:h-[796px] h-[350px] w-[100%] bg-black/50 z-[-1]  relative">
    <div class="absolute sm:bottom-[200px] bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
        <a class="font-bold text-red-600 text-4xl">BPKAD </a> <a class="font-bold text-4xl text-white">KOTA
            SURAKARTA</a> <br>
        <a class="font-bold text-white">Badan Pengelolaan Keuangan & Aset Daerah Kota Surakarta</a>
    </div>
</div>
<img class="absolute z-[-2] w-[100%] sm:h-[796px] h-[350px] object-cover top-0 left-0"
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

    <div class="grid grid-cols-1 sm:grid-cols-2  container sm:gap-8 gap-5 m-auto">
        <div
            class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-3 p-5 transition duration-150 cursor-pointer">
            <div>
                <img src="{{ asset('assets/local/simdang.png') }}" class="w-[80%] m-auto" />
            </div>
            <div class="col-span-2">
                <p class="text-white font-bold text-2xl italic mb-3">APLIKASI FMIS</p>
                <p class="text-sm text-white/80 ">Financial Management Information System (FMIS) dikembangkan dari
                    basis SIMDA untuk mempermudah manajemen keuangan daerah pada Pemerintah Kota Surakarta.</p>
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

<div class=" mt-16 mb-16">

    <p class="text-primary font-bold text-3xl italic mb-3 text-center">Informasi Berkala</p>
    <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto">Informasi yang wajib di perbaharui
        kemudian disediakan dan
        diumumkan kepada
        publik secara berkala sekurang-kurangnya setiap 6 bulan sekali</p>

    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 sm:m-10 m-5">
        <div
            class="h-[75px] hover:shadow-xl border hover:border-none hover:bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                info
            </span>
            <span class="font-bold">Informasi Tentang Profil Badan Public</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none hover:bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                history_edu
            </span>
            <span class="font-bold">Ringkasan Program dan Kegiatan yang sedang dijalankan</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none hover:bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                request_quote
            </span>
            <span class="font-bold">Ringkasan Laporan Keuangan</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none   hover:bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                inventory_2
            </span>
            <span class="font-bold">Informasi Pengadaan Barang dan Jasa </span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none  hover:bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                local_police
            </span>
            <span class="font-bold">Informasi Tentang Peraturan Keputusan atau Kebijakan yang mengikat</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none  hover:bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                warning
            </span>
            <span class="font-bold">Informasi tentang prosedur peringatan dini dan prosedur evakuasi keadaan
                darurat</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none hover:bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
            <span class="material-symbols-outlined font-bold  text-primary mr-2">
                work
            </span>
            <span class="font-bold">Ringkasan Informasi Tentang Kinerja</span>
        </div>

        <div
            class="h-[75px] hover:shadow-xl border hover:border-none  hover:bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
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
            <p class=" text-white/80 sm:text-md text-sm mb-6">Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik
            </p>
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
        <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
            <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                <img class="w-full h-full object-cover rounded-md hover:scale-50"
                    src="https://cdn-2.tstatic.net/jateng/foto/bank/images/kericuhan-di-rutan-solo-kamis-1012019.jpg" />

            </div>
            <p class="italic font-bold text-md text-center px-3 pb-3">Pemerintah Kota Surakarta Meraih Opini WTP
                ke-12 Secara
                berturut
            </p>
        </a>

        <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
            <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                <img class="w-full h-full object-cover rounded-md hover:scale-50"
                    src="https://asset.kompas.com/crops/Wz555Tw9E7BzYVE3_UgSwYYk4KM=/0x0:780x520/750x500/data/photo/2019/09/16/5d7f65d83d0b9.jpg" />

            </div>
            <p class="italic font-bold text-md text-center px-3 pb-3">Perbedaan Solo, Surakarta, Kartasura, dan
                Solo Baru,
                Ini Sejarahnya
            </p>
        </a>

        <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
            <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                <img class="w-full h-full object-cover rounded-md hover:scale-50"
                    src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

            </div>
            <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                Properti, Iringan,
                dan Maknanya
            </p>
        </a>

        <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
            <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                <img class="w-full h-full object-cover rounded-md hover:scale-50"
                    src="https://asset.kompas.com/crops/3lNrjcur7miM2mLmWyfwUlC5Oq0=/0x0:0x0/750x500/data/photo/2021/10/11/6164296e46e4f.jpg" />

            </div>
            <p class="italic font-bold text-md text-center px-3 pb-3">Mengenal Bedhaya Ketawang, Tarian Sakral dari
                Keraton
                Surakarta
            </p>
        </a>


    </div>
</div>

@endsection
