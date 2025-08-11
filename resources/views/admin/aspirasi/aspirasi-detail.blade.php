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
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="/admin/aspirasi/detail"
                            class="ml-1 text-md font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Detail</a>
                    </div>
                </li>
            </ol>
        </nav>

        <p class="title">Aspirasi Masyarakat</p>

        <form>
            <div class="mb-6 sm:w-[50%]">
                <label for="aspirasi-nama" class="block mb-2 text-md font-medium text-gray-600 ">Nama</label>
                <input type="text" id="aspirasi-nama" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md  block w-full p-2.5 "
                    placeholder="Nama Pemberi Aspirasi" required>
            </div>

            <div class="mb-6 sm:w-[50%]">
                <label for="aspirasi-email" class="block mb-2 text-md font-medium text-gray-600 ">Email</label>
                <input type="text" id="aspirasi-email" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md  block w-full p-2.5 "
                    placeholder="Email Pemberi Aspirasi" required>
            </div>

            <div class="mb-6">
                <label for="aspirasi-alamat" class="block mb-2 text-md font-medium text-gray-600 ">Alamat</label>
                <input type="text" id="aspirasi-alamat" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md  block w-full p-2.5 "
                    placeholder="Alamat Pemberi Aspirasi" required>
            </div>

            <div class="mb-6">
                <label for="aspirasi-text" class="block mb-2 text-md font-medium text-gray-600 ">
                    Aspirasi</label>
                <textarea type="text" id="aspirasi-text" rows="4" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md  block w-full p-2.5 " placeholder="Aspirasi"
                    required></textarea>
            </div>

            <div class="mb-6 flex justify-between items-end">
                <div class=" ">
                    <label class="block mb-2 text-md font-medium text-gray-600" for="user_avatar">File Terkait</label>
                    <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                        class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                        <span class="material-symbols-outlined text-white mr-3">
                            download
                        </span>
                        Download File</button>
                </div>
                <div>
                    <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                        class="flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                        <span class="material-symbols-outlined text-white mr-3">
                            mail
                        </span>Kirim Email
                    </button>
                </div>
            </div>
    </div>

    </form>
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
