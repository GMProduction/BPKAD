@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">SK Pengelola Website </a> <br>
                <a class="font-bold text-white">SK Pengelola Website BPKAD Surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/gedung.jpg') }}" alt="Background" />
    </div>




    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi first">
                        <div class="card-header">SK Pengelola Website </div>
                        <div class="card-body">
                            <div class="w-full text-center">
                                <a id="aImage" target="_blank">
                                    <iframe style="height: 80vh" {{-- src dibawah diganti url dari inputan --}} src="{{ $data ? $data->url : '' }}"
                                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('morejs')
    <script></script>
@endsection
