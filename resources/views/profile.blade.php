@extends('base')

@section('content')

<div class="mt-[-89px]  h-[350px] w-[100%] bg-black/50 z-[-1]  relative">
    <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
        <a class="font-bold text-red-600 text-4xl">PROFIL </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
        <a class="font-bold text-white">Profil bpkad surakarta</a>
    </div>
</div>
<img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
    src="{{ asset('assets/local/slide.png') }}" />







@endsection
