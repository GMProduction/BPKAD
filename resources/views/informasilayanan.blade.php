@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">INFORMASI LAYANAN </a> <br>
                <a class="font-bold text-white">Informasi Layanan bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/layanan.png') }}" alt="Background" />
    </div>

    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi ">
                        <div class="card-header">Informasi Layanan</div>
                        <div class="card-body">
                            <div class="w-full text-center">
                                <a id="aImage" target="_blank">
                                    <img id="srcImg" src="{{ $data ? $data->url : '' }}"
                                        class="  object-cover w-[80%] mx-auto " />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('morejs')
    <script>
        {{-- document.addEventListener("DOMContentLoaded", () => { --}}
        {{--    short_image() --}}
        {{-- }); --}}

        {{-- function short_image() { --}}
        {{--    fetch('{{ route('maklumat.json') }}') --}}
        {{--        .then((response) => response.json()) --}}
        {{--        .then((data) => { --}}
        {{--            let href = "https://bpkad.surakarta.go.id" + data.url; --}}
        {{--            href = href.replace('/dataimage', data?.structure) --}}
        {{--            document.getElementById('aImage').setAttribute('href', href) --}}
        {{--            document.getElementById('srcImg').setAttribute('src', href) --}}

        {{--            console.log("data " + data.url) --}}
        {{--        }) --}}

        {{-- } --}}
    </script>
@endsection
