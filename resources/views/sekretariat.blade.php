@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/50 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-red-600 text-4xl mb-3 inline-block mr-3">Sekretariat </a> <a class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="font-bold text-white w-[70%] block mx-auto">Sekretariat Badan Pengelolaan Keuangan dan Aset Daerah
                dipimpin oleh seorang Sekretaris yang berkedudukan di bawah dan bertanggung jawab kepada Kepala Badan</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/slide.png') }}" />

    <div class=" mt-16 mb-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Tugas Sekretariat</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto">Sekretaris mempunyai tugas melaksanakan pengelolaan perencanaan, penganggaran, manajemen resiko, monitoring, evaluasi dan pelaporan, kepegawaian, pengelolaan keuangan dan aset, serta pengembangan kelembagaan dan tata laksana pelayanan publik, kehumasan dan kerjasama pada badan</p>

        <p class="text-primary font-bold text-3xl italic mb-3 text-center mt-16">Subbagian </p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">1. Subbagian Perencanaan dan Penganggaran</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">2. Subbagian Administrasi dan Umum</p>

        <p class="text-primary font-bold text-3xl italic  text-center mt-16 mb-10">Tugas </p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">Subbagian Perencanaan dan Penganggaran mempunyai tugas pelaksanaan, penganggaran, dan evaluasi kinerja</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">Subbagian Administrasi dan Umum mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait administrasi umum, pengelolaan pelayanan umum, penatausahaan barang milik daerah, kelembagaan, tata laksana pengelolaan administrasi kepegawaian, serta pengelolaan administrasi keuangan pada badan</p>
    </div>
@endsection
