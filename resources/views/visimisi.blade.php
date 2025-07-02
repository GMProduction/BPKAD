@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="title">VISI & MISI</a> <br>
                <a>Profil BPKAD Surakarta</a>
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
                        <div class="card-header">Visi</div>
                        <div class="card-body">
                            <p class="text-sm   mx-auto">{!! $data ? $data->vision : '' !!}</p>
                        </div>
                    </div>

                    <!-- Card Misi -->
                    <div class="card-visimisi second">
                        <div class="card-header">Misi</div>
                        <div class="card-body">
                            <p class="text-sm   mx-auto mb-3">{!! $data ? $data->mission : '' !!}</p>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Gambar -->
                <div class="visi-misi-image">
                    <img src="{{ asset('assets/local/javanese_people.png') }}" alt="Gambar Visi Misi">
                </div>
            </div>
        </div>
    </section>
@endsection
