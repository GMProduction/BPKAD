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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Artikel</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="panel bg-white border">
            <div class="flex justify-between mb-3 items-end">
                <p class=" font-semibold">Artikel</p>
                <button type="button" onclick="location.href='{{route('admin.article.form')}}'"
                    class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                    <span class="material-symbols-outlined text-white mr-3">
                        add
                    </span>Tambah Artikel
                </button>
            </div>
            <div class="overflow-x-auto relative shadow-sm ">
                <table class="w-full text-sm text-left text-gray-500  ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Judul Artikel
                            </th>

                            <th scope="col" class="py-3 px-6">
                                Tanggal
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Ubah</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <th class="text-center">
                                1
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 ">
                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan
                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan
                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                10 November 2022
                            </th>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="#" data-modal-toggle="modalEdit" onclick="location.href='/admin/artikel-form'"
                                    class="font-medium text-blue-600  button-link bg-blue-100">Ubah</a>

                                    <a href="#" data-modal-toggle="modalEdit"
                                    class="font-medium text-red-700  button-link bg-red-100">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
