@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">MAKMLUMAT PELAYANAN </a> <br>
            <a class="font-bold text-white">Maklumat Pelayanan bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 ">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">Maklumat Pelayanan</p>
            <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <img id="srcImg" class="  object-cover w-[80%] mx-auto " />
                </a>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            short_image()
        });

        function short_image() {
            fetch('{{ route('maklumat.json') }}')
                .then((response) => response.json())
                .then((data) => {
                    // let href = "https://bpkad.surakarta.go.id" + data.url;
                    let href = "http://127.0.0.1:8000" + data.url;
                    href = href.replace('/dataimage', data?.structure)
                    document.getElementById('aImage').setAttribute('href', href)
                    document.getElementById('srcImg').setAttribute('src', href)

                    console.log("data " + data.url)
                })

        }
    </script>
@endsection
