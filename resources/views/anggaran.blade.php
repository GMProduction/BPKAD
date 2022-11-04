@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/60 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-primary  text-4xl mb-3 inline-block mr-3">ANGGARAN </a> <a
                class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Bidang Anggaran dipimpin
                oleh seorang Kepala Bidang yang berkedudukan dibawah dan bertanggung jawab kepada Kepala Badan melalui
                sekretaris</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <div class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic mb-3 text-center">Tugas Bidang Anggaran</p>
            <p class="text-sm text-center m mx-auto">Bidang anggaran mempunyai tugas
                melaksanakan kebijakan terkait perencanaan anggaran, pelaksanaan dan pengendalian anggaran, pengelolaan
                sistem informasi keuangan daerah</p>
        </div>
        <div class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic mb-3 text-center ">Subbagian </p>
            <p class="text-sm text-center m mx-auto mb-3">1. Subbidang Perencanaan Anggaran</p>
            <p class="text-sm text-center m mx-auto mb-3">2. Subbidang Pelaksanaan dan
                Pengendalian Anggaran</p>
            <p class="text-sm text-center m mx-auto mb-3">3. Subbidang Pengelolaan Sistem
                Informasi Keuangan Daerah</p>
        </div>
        <div class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic  text-center  mb-10">Tugas </p>
            <p class="text-sm text-center m mx-auto mb-3">Subbidang Perencanaan Anggaran
                mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait perencanaan anggaran</p>
            <p class="text-sm text-center m mx-auto mb-3">Subbidang Pelaksanaan dan Pengendalian
                Anggaran mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait pelaksanaan dan pengendalian anggaran
            </p>
            <p class="text-sm text-center mx-auto mb-3">Subbidang Pengelolaan Sistem Informasi
                Keuangan Daerah mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait pengelolaan sistem informasi
                keuangan daerah</p>
        </div>
    </div>
@endsection
