@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-primary  text-4xl mb-3 inline-block mr-3">Informasi </a> <a class="font-bold text-4xl text-white inline-block ">Berkala</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Informasi yang wajib diperbaharui kemudian disediakan dan diumumkan kepada publik secara berkala sekurang-kurangnya setiap 6 bulan sekali.</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Informasi Berkala</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto">Informasi yang wajib di perbaharui
            kemudian disediakan dan
            diumumkan kepada
            publik secara berkala sekurang-kurangnya setiap 6 bulan sekali</p>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 sm:m-10 m-5">
            <div
                class="h-[75px] hover:shadow-xl border hover:border-none bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    info
                </span>
                <span class="font-bold">Informasi Tentang Profil Badan Public</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    history_edu
                </span>
                <span class="font-bold">Ringkasan Program dan Kegiatan yang sedang dijalankan</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    request_quote
                </span>
                <span class="font-bold">Ringkasan Laporan Keuangan</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none   bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    inventory_2
                </span>
                <span class="font-bold">Informasi Pengadaan Barang dan Jasa </span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none  bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    local_police
                </span>
                <span class="font-bold">Informasi Tentang Peraturan Keputusan atau Kebijakan yang mengikat</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none  bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    warning
                </span>
                <span class="font-bold">Informasi tentang prosedur peringatan dini dan prosedur evakuasi keadaan
                    darurat</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    work
                </span>
                <span class="font-bold">Ringkasan Informasi Tentang Kinerja</span>
            </div>

            <div
                class="h-[75px] hover:shadow-xl border hover:border-none  bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    dangerous
                </span>
                <span class="font-bold">Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau
                    Pelanggaran</span>
            </div>


        </div>
    </div>
@endsection
