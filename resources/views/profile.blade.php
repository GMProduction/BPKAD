@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/50 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-red-600 text-4xl">PROFIL </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="font-bold text-white">Profil bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/slide.png') }}" />

    <div class=" mt-16 mb-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Visi</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto">TERWUJUDNYA PENGELOLAAN KEUANGAN DAN ASET DAERAH
            YANG AKUNTABEL DAN TRANSPARAN</p>

        <p class="text-primary font-bold text-3xl italic mb-3 text-center mt-16">Misi</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">1. MENINGKATKAN KELANCARAN DAN KETERTIBAN
            PENGELOLAAN KEUANGAN DAN ASET DAERAH SESUAI DENGAN PERATURAN YANG BERLAKU</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">2. MEWUJUDKAN PENGELOLAAN KEUANGAN DAERAH
            YANG EFEKTIF, EFISIEN, SERTA AKUNTABLE DENGAN MEMPERHATIKAN ASAS KEPATUTAN DAN KEADILAN</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[75%] w-[95%] mx-auto mb-3">3. MENINGKATKAN PEMBERDAYAAN ASET DAERAH
            SECARA EFEKTIF DAN EFISIEN</p>

        <p class="text-primary font-bold text-3xl italic  text-center mt-16 mb-10">Struktur Organisasi</p>
        <div class="w-full text-center">
            <img src="{{ asset('assets/local/struktur.png') }}" class="  object-cover h-[600px] mx-auto " />
        </div>
    </div>
@endsection
