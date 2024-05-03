@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">VISI & MISI </a> <br>
            <a class="font-bold text-white">Profil bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <div
            class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3 ">Visi</p>
            <p class="text-sm   mx-auto">{!! $data ? $data->vision : '' !!}</p>
        </div>
        <div
            class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3  ">Misi</p>
            <p class="text-sm   mx-auto mb-3">{!! $data ? $data->mission : '' !!}</p>
        </div>

    </div>
@endsection
