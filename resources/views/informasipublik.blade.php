@extends('base')

@section('content')
    <x-page-header>
        <a class="font-bold text-white  text-4xl">DAFTAR INFORMASI PUBLIK </a> <br>
        <a class="font-bold text-white">Dafta Informasi Publik bpkad surakarta</a>
    </x-page-header>

    <x-panel-content title="Daftar Informasi Publik" cardStyle="margin-bottom: 10px; margin-top: 50px;">

        <div class="bg-white p-10  sm:w-[80%] w-[95%]  mx-auto mb-6 transform transition duration-500">
            <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <iframe style="height: 80vh"
                        src="https://drive.google.com/file/d/1ruBBFTSUJAZ45sZnz8xUI2IW3RDxsyKb/preview"
                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                </a>
            </div>
        </div>
    </x-panel-content>
@endsection

@section('morejs')
    <script></script>
@endsection
