@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">Motto </a> <br>
                <a class="font-bold text-white">Profil bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/visimisi.png') }}" alt="Background"
            style="object-position: center top;" />
    </div>




    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi first">
                        <div class="card-header">Motto</div>
                        <div class="card-body">
                            <div class="mx-auto motto-text">{!! $data ? $data->motto : '' !!}</div>
                        </div>
                    </div>
                </div>
    </section>
@endsection
