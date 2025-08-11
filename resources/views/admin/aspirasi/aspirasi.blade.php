@extends('admin.base')

@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="panel h-screen">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin"
                        class="inline-flex items-center text-md font-medium text-gray-700 hover:text-gray-900  ">
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
                        <a href="/admin/aspirasi"
                            class="ml-1 text-md font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Aspirasi</a>
                    </div>
                </li>

            </ol>
        </nav>

        <div class="bg-white p-5 rounded-sm">
            <p class="title">Tabel Aspirasi</p>

            <div class="border p-3 rounded-lg">
                <table id="example" class="stripe hover " style="width:100%;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Checklist</th>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Aspirasi</th>
                            <th>Gambar</th>
                            <th data-priority="5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $v)
                            <tr>
                                <td class="text-center">
                                    <input id="default-checkbox" type="checkbox" value=""
                                        class="w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500   focus:ring-2  0 m-auto">
                                </td>
                                <td class="text-md" class="ai-save">Tiger Nixon</td>
                                <td class="text-md">System@gmail.com</td>
                                <td>
                                    <p class="w-[100px] md:w-[300px] 2xl:w-[500px]   truncate text-md">Lorem Ipsum is simply
                                        dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry's
                                        standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                        type
                                        and scrambled it to make a type specimen book. It has survived not only five
                                        centuries,
                                        but also the leap into electronic typesetting, remaining essentially unchanged. It
                                        was
                                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                        passages, and more recently with desktop publishing software like Aldus PageMaker
                                        including versions of Lorem Ipsum.</p>
                                </td>
                                <td class="text-center"><img src="{{ asset('assets/local/gedung.jpg') }}"
                                        class="w-[75px] h-[50px] object-cover mx-auto" /></td>
                                <td class="text-center">
                                    <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                                        class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p style="text-align: center">Belum Ada Data</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
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
