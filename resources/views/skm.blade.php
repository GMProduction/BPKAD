@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">STRUKTUR ORGANISASI </a> <a
                class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="font-bold text-white">Profil bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%]  mx-auto shadow-md mb-6 transform transition duration-500">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">Survey Kepuasan Masyarakat</p>
            <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <iframe style="height: 80vh"
                        src="https://drive.google.com/file/d/1her3udg4UWNYdpi3aNeZWli4QSy9EaGx/preview"
                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script></script>
@endsection
