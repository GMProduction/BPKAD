@extends('admin.base')
@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="panel h-full">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900  ">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Informasi</a>
                    </div>
                </li>

            </ol>
        </nav>

        <div class="panel bg-white border">
            <div class="border-b border-gray-200  mb-4">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 active"
                            id="berkala-tab" data-tabs-target="#berkala" type="button" role="tab"
                            aria-controls="berkala" aria-selected="true">Informasi Berkala</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="sertamerta-tab" data-tabs-target="#sertamerta" type="button" role="tab"
                            aria-controls="sertamerta" aria-selected="false">Informasi Serta Merta</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="setiapsaat-tab" data-tabs-target="#setiapsaat" type="button" role="tab"
                            aria-controls="setiapsaat" aria-selected="false">Informasi Setiap Saat</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="dikecualikan-tab" data-tabs-target="#dikecualikan" type="button" role="tab"
                            aria-controls="dikecualikan" aria-selected="false">Informasi Dikecualikan</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class=" p-4 rounded-lg  " id="berkala" role="tabpanel" aria-labelledby="berkala-tab">
                    <div>

                        <div class="overflow-x-auto relative shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            #
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Nama Informasi
                                        </th>

                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Lihat Detail</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            1
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Informasi Tentang Profil Badan PUblic
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="/admin/informasi/detail"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            2
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Ringkasan Program dan Kegiatan yang sedang dijalankan
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="/admin/informasi/detailbyyear"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            3
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Ringkasan Laporan Keuangan
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="/admin/informasi/detail"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            4
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Informasi Pengadaan Barang dan Jasa
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            5
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Informasi Tentang Peraturan Keputusan atau Kebijakan yang mengikat
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            6
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Informasi tentang prosedur peringatan dini dan prosedur evakuasi keadaan darurat
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            7
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Ringkasan Informasi Tentang Kinerja
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>

                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">
                                            8
                                        </th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                                        </td>
                                    </tr>




                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="sertamerta" role="tabpanel" aria-labelledby="sertamerta-tab">
                    <div>
                        <div class="mb-6">
                            <label for="anggaran-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Anggaran</label>
                            <textarea type="text" id="anggaran-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="anggaran-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="anggaran-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="setiapsaat" role="tabpanel" aria-labelledby="setiapsaat-tab">
                    <div>
                        <div class="mb-6">
                            <label for="perbendaharaan-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Perbendaharaan dan Akuntansi</label>
                            <textarea type="text" id="perbendaharaan-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="perbendaharaan-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub-tugas"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="perbendaharaan-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg  hidden" id="dikecualikan" role="tabpanel"
                    aria-labelledby="dikecualikan-tab">
                    <div>
                        <div class="mb-6">
                            <label for="aset-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Aset</label>
                            <textarea type="text" id="aset-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="aset-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="aset-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('morejs')
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    @endsection


    </body>

    </html>
