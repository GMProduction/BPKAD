@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl mb-3 inline-block mr-3">Aset </a> <a
                class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Bidang Aset dipimpin oleh
                seorang Kepala Bidang yang berkedudukan dibawah dan bertanggung jawab kepada Kepala Badan melalui
                Sekretaris</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <div class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3 ">Tugas Bidang Aset</p>
            <p class="text-sm   mx-auto">Bidang aset mempunyai tugas melaksanakan
                kebijakan daerah terkait pelaksanaan dan penilaian barang millik daerah</p>
        </div>
        <div class="bg-white p-10 md:w-[60%] sm:w-[75%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3  ">Sub Bidang </p>
            <p class="text-sm   mx-auto mb-3">1. Subbidang Penatalaksanaan Barang
                Milik Daerah</p>
            <p class="text-sm   mx-auto mb-3">2. Subbidang Penatausahaan Barang
                Milik Daerah</p>
            <p class="text-sm   mx-auto mb-3">3. Subbidang Penilaian dan Pengawasan
                Barang Milik Daerah</p>


            <p class="text-primary font-bold text-3xl italic   mb-6 mt-10">Tugas Sub Bidang</p>
            <p class="text-sm   mx-auto mb-3">Subbidang Penatalaksanaan Barang Milik
                Daerah mempunyai tugas pelaksanaan, monitoring, dan evaluasi terkait penatalaksanaan barang milik daerah</p>
            <p class="text-sm   mx-auto mb-3">Subbidang Penatausahaan Barang Milik
                Daerah mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait penatausahaan barang milik daerah</p>
            <p class="text-sm   mx-auto mb-3">Subbidang Penilaian dan Pengawasan
                Barang Milik Daerah mempunyai tugas pelaksanaan, monitoring dan evaluasi terkait penilaian barang milik
                daerah</p>
        </div>

    </div>
@endsection
