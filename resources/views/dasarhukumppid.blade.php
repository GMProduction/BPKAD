@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Dasar Hukum PPID </a> <br>
            <a class="font-bold text-white">Dasar Hukum PPID BPKAD Surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%]  mx-auto shadow-md mb-6 transform transition duration-500">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">Dasar Hukum PPID</p>
            <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <iframe style="height: 80vh" {{-- src dibawah diganti url dari inputan --}}
                        src="https://drive.google.com/file/d/1ruBBFTSUJAZ45sZnz8xUI2IW3RDxsyKb/preview"
                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script></script>
@endsection
