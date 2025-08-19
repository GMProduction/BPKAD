@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">STANDAR PELAYANAN </a> <br>
                <a class="font-bold text-white">Standar Pelayanan bpkad surakarta</a>
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
                    <div class="card-visimisi first">
                        <div class="card-header">Standar Pelayanan</div>
                        <div class="card-body">

                            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6 mb-5 mt-5">
                                @php
                                    // Data bisa dari controller, ini contoh hardcode dari tabel
                                    $dataBidang = [
                                        [
                                            'url' => 'assets/local/skretariat.png',
                                            'nama' => 'Sekertariat',
                                            'link' =>
                                                'https://drive.google.com/drive/folders/1t0vAt7vrjttSsrlH-dvbllLfpDeQvKfm',
                                        ],
                                        [
                                            'url' => 'assets/local/anggaran.png',
                                            'nama' => 'Anggaran',
                                            'link' =>
                                                'https://drive.google.com/open?id=13QCBGgdkkSL4kkeD0X5G1U_nmqqpyObS&authuser=0',
                                        ],
                                        [
                                            'url' => 'assets/local/akunting.png',
                                            'nama' => 'Perbendaharaan dan Akuntansi',
                                            'link' =>
                                                'https://drive.google.com/drive/folders/1r2XIkzkxe-VKrTT2EpdYvQB7W8AiQEcY?usp=share_link',
                                        ],
                                        [
                                            'url' => 'assets/local/aset.png',
                                            'nama' => 'Aset',
                                            'link' =>
                                                'https://drive.google.com/drive/folders/1F-KpyifFcjYZgNPkgYlQq2hxQBlLzVku?usp=share_link',
                                        ],
                                    ];
                                @endphp

                                @foreach ($dataBidang as $bidang)
                                    <a class="bg-white shadow rounded-lg overflow-hidden block no-underline text-center"
                                        style="text-decoration: none" href="{{ $bidang['link'] }}" target="_blank">
                                        {{-- Gambar (contoh pakai gambar default) --}}
                                        <img src="{{ asset($bidang['url']) }}" alt="Gambar {{ $bidang['nama'] }}"
                                            class="w-full h-40 object-cover">

                                        <div class="p-2">
                                            <p class="text-gray-600 flex justify-center items-center font-bold mb-0">
                                                {{ $bidang['nama'] }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>


                            {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-md text-left text-gray-500 ">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Bidang
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Link
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b  dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                1
                                            </th>
                                            <td class="px-6 py-4">
                                                Sekertariat
                                            </td>

                                            <td class="px-6 py-4">
                                                <a target="_blank"
                                                    href="https://drive.google.com/drive/folders/1t0vAt7vrjttSsrlH-dvbllLfpDeQvKfm"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Link</a>
                                            </td>
                                        </tr>

                                        <tr class="bg-white border-b  dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                2
                                            </th>
                                            <td class="px-6 py-4">
                                                Anggaran
                                            </td>

                                            <td class="px-6 py-4">
                                                <a target="_blank"
                                                    href="https://drive.google.com/open?id=13QCBGgdkkSL4kkeD0X5G1U_nmqqpyObS&authuser=0"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Link</a>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                3
                                            </th>
                                            <td class="px-6 py-4">
                                                Perbendaharaan dan Akuntansi
                                            </td>

                                            <td class="px-6 py-4">
                                                <a target="_blank"
                                                    href="https://drive.google.com/drive/folders/1r2XIkzkxe-VKrTT2EpdYvQB7W8AiQEcY?usp=share_link"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Link</a>
                                            </td>
                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                4
                                            </th>
                                            <td class="px-6 py-4">
                                                Aset
                                            </td>

                                            <td class="px-6 py-4">
                                                <a target="_blank"
                                                    href="https://drive.google.com/drive/folders/1F-KpyifFcjYZgNPkgYlQq2hxQBlLzVku?usp=share_link"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Link</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
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
