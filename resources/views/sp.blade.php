@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">STANDAR PELAYANAN </a> <br>
                <a class="font-bold text-white">Standar Pelayanan bpkad surakarta</a>
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
                        <div class="card-header">Standar Pelayanan</div>
                        <div class="card-body">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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

                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
