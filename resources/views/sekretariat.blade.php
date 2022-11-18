@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl mb-3 inline-block mr-3">SEKRETARIAT </a> <a
                class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Sekretariat Badan
                Pengelolaan Keuangan dan Aset Daerah
                dipimpin oleh seorang Sekretaris yang berkedudukan di bawah dan bertanggung jawab kepada Kepala Badan</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <div
            class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3 ">Tugas Sekretariat</p>
            <p class="text-sm   mx-auto">Sekretaris mempunyai tugas melaksanakan pengelolaan perencanaan,
                penganggaran, manajemen resiko, monitoring, evaluasi dan pelaporan, kepegawaian, pengelolaan keuangan dan
                aset, serta pengembangan kelembagaan dan tata laksana pelayanan publik, kehumasan dan kerjasama pada badan
            </p>
        </div>

        <div
            class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3  ">Sub Bidang </p>
            <p class="text-sm  md:w-[50%] sm:w-[75%] w-[95%]  mb-3">1. Sub Bidang Perencanaan dan
                Penganggaran</p>
            <p class="text-sm   mx-auto mb-3">2. Sub Bidang Administrasi dan Umum</p>

            <p class="text-primary font-bold text-3xl italic mb-6  mt-10">Tugas Sub Bidang</p>
            <p class="text-sm   mx-auto mb-3">Sub Bidang Perencanaan dan Penganggaran
                mempunyai tugas pelaksanaan, penganggaran, dan evaluasi kinerja</p>
            <p class="text-sm   mx-auto mb-3">Sub Bidang Administrasi dan Umum
                mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait administrasi umum, pengelolaan pelayanan umum,
                penatausahaan barang milik daerah, kelembagaan, tata laksana pengelolaan administrasi kepegawaian, serta
                pengelolaan administrasi keuangan pada badan</p>
        </div>

        <div
            class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3  ">Gallery </p>
            <div class="slick-gallery">

            </div>
        </div>
    </div>
@endsection
