@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">STRUKTUR ORGANISASI </a> <a
                    class="font-bold text-4xl text-white">BPKAD</a> <br>
                <a class="font-bold text-white">Profil bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/struktur.png') }}" alt="Background" />
    </div>




    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi first">
                        <div class="card-header">Struktur Organisasi</div>
                        <div class="card-body">
                            <div class="w-full text-center">
                                <a id="aImage" target="_blank">
                                    <img id="srcImg" class="  object-cover w-[80%] mx-auto " />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('morejs')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            short_image()
        });

        function short_image() {
            fetch('{{ route('profile.json') }}')
                .then((response) => response.json())
                .then((data) => {
                    let href = '{{ asset('dataimage') }}';
                    href = href.replace('/dataimage', data?.structure)
                    document.getElementById('aImage').setAttribute('href', href)
                    document.getElementById('srcImg').setAttribute('src', href)
                })
        }
    </script>
@endsection
