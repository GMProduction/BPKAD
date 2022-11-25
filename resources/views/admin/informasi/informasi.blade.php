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
                    <a href="{{ route('dashboard') }}"
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
                            class="tabs-btn  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="berkala-tab" data-tabs-target="#berkala" type="button" role="tab"
                            aria-controls="berkala" aria-selected="false">Informasi Berkala
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="sertamerta-tab" data-tabs-target="#sertamerta" type="button" role="tab"
                            aria-controls="sertamerta" aria-selected="false">Informasi Serta Merta
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="setiapsaat-tab" data-tabs-target="#setiapsaat" type="button" role="tab"
                            aria-controls="setiapsaat" aria-selected="false">Informasi Setiap Saat
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="dikecualikan-tab" data-tabs-target="#dikecualikan" type="button" role="tab"
                            aria-controls="dikecualikan" aria-selected="false">Informasi Dikecualikan
                        </button>
                    </li>
                </ul>
            </div>

            <div id="myTabContent">
                <div class=" p-4 rounded-lg  " id="berkala" role="tabpanel" aria-labelledby="berkala-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md">
                            <span class="material-symbols-outlined text-green-700 mr-2">
                                info
                            </span>
                            <span class="text-sm text-green-700">Informasi yang wajib diperbaharui kemudian
                                disediakan dan diumumkan kepada publik secara berkala sekurang-kurangnya setiap 6 bulan
                                sekali.
                            </span>
                        </div>
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
                                @forelse($data as $v)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="text-center">{{ $loop->index + 1 }}</th>
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $v->name }}
                                        </th>

                                        <td class="py-4 px-6 text-right">
                                            <a href="{{ route('admin.information.periodic', ['slug' => $v->slug]) }}"
                                               class="font-medium text-blue-600   button-link bg-blue-100">Lihat
                                                Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class=" p-4 rounded-lg hidden" id="sertamerta" role="tabpanel" aria-labelledby="sertamerta-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Informasi yang berkaitan dengan hajat hidup orang banyak
                                dan ketertiban umum serta wajib diumumkan secara serta merta tanpa penundaan.
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">Informasi Serta Merta</p>

                            </div>
                            <button type="button" data-modal-toggle="modalTambah"
                                    class="max-h-[47px] ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none max">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah Informasi Serta Merta
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
                                        Nama Informasi
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
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        Informasi Tentang Profil Badan PUblic
                                    </th>

                                    <td class="py-4 px-6 text-right">
                                        <a href="#" data-modal-toggle="modalEdit"
                                           class="font-medium text-blue-600  button-link bg-blue-100 mr-1">Ubah</a>

                                        <a href="#" data-modal-toggle="modalHapus"
                                           class="font-medium text-red-600  button-link bg-red-100">Hapus</a>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class=" p-4 rounded-lg hidden" id="setiapsaat" role="tabpanel" aria-labelledby="setiapsaat-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Informasi Setiap Saat adalah informasi yang harus disediakan oleh Badan Publik dan siap tersedia untuk dapat langsung diberikan kepada Pemohon Informasi Publik ketika terdapat permohonan terhadap Informasi Publik tersebut.
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">Informasi Setiap Saat</p>

                            </div>
                            <button type="button" data-modal-toggle="modalTambah"
                                    class="max-h-[47px] ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none max">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah Informasi Setiap Saat
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
                                        Nama Informasi
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
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        Informasi Tentang Profil Badan PUblic
                                    </th>

                                    <td class="py-4 px-6 text-right">
                                        <a href="#" data-modal-toggle="modalEdit"
                                           class="font-medium text-blue-600  button-link bg-blue-100 mr-1">Ubah</a>

                                        <a href="#" data-modal-toggle="modalHapus"
                                           class="font-medium text-red-600  button-link bg-red-100">Hapus</a>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class=" p-4 rounded-lg  hidden" id="dikecualikan" role="tabpanel"
                     aria-labelledby="dikecualikan-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Informasi yang tidak dapat diakses Pemohon Informasi Publik sesuai Undang-Undang Nomor 14 Tahun 2008 Tentang Keterbukaan Informasi Publik.
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">Informasi Dikecualikan</p>

                            </div>
                            <button type="button" data-modal-toggle="modalTambah"
                                    class="max-h-[47px] ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none max">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah Informasi Dikecualikan
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
                                        Nama Informasi
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
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                        Informasi Tentang Profil Badan PUblic
                                    </th>

                                    <td class="py-4 px-6 text-right">
                                        <a href="#" data-modal-toggle="modalEdit"
                                           class="font-medium text-blue-600  button-link bg-blue-100 mr-1">Ubah</a>

                                        <a href="#" data-modal-toggle="modalHapus"
                                           class="font-medium text-red-600  button-link bg-red-100">Hapus</a>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="dropdownperaturan"
             class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="infoperaturan">
                <li>
                    <a href="/admin/informasi/detailbyyear"
                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Peraturan
                        Daerah</a>
                </li>
                <li>
                    <a href="/admin/informasi/detailbyyear"
                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Peraturan
                        Walikota</a>
                </li>
                <li>
                    <a href="/admin/informasi/detailbyyear"
                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Peraturan
                        Lainya</a>
                </li>

            </ul>
        </div>

        <!-- Modal Tambah -->
        <div id="modalTambah" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Tambah Informasi
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="modalTambah">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 ">
                        <div class="mb-3">
                            <label for="nama-info" class="block mb-2 text-sm font-medium text-gray-700 ">Nama
                                Informasi</label>
                            <input type="text" id="nama-info"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                   placeholder="Masukan Nama Informasi" required>
                        </div>

                        <p class="text-sm pb-1">Konten / Isi</p>
                        <div class="border p-3 border-gray-200 rounded-lg">
                            <div class="mb-3">
                                <label for="link-info"
                                       class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                <input type="text" id="link-info"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                       placeholder="Masukan Email Anda" required>
                            </div>

                            <p class="text-center text-sm">atau</p>
                            <div class="mb-3">
                                <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                    file</label>
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none"
                                    aria-describedby="upload-file_help" id="upload-file" type="file">

                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                        <button type="button" data-modal-toggle="modalTambah"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                save
                            </span>Simpan Informasi
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="modalEdit" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Edit Informasi
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-toggle="modalEdit">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 ">
                        <div class="mb-3">
                            <label for="e-nama-info" class="block mb-2 text-sm font-medium text-gray-700 ">Nama
                                Informasi</label>
                            <input type="text" id="e-nama-info"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                   placeholder="Masukan Nama Informasi" required>
                        </div>

                        <p class="text-sm pb-1">Konten / Isi</p>
                        <div class="border p-3 border-gray-200 rounded-lg">
                            <div class="mb-3">
                                <label for="e-link-info"
                                       class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                <input type="text" id="e-link-info"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                       placeholder="Masukan Email Anda" required>
                            </div>

                            <p class="text-center text-sm">atau</p>
                            <div class="mb-3">
                                <label class="block mb-2 text-sm font-medium text-gray-700 " for="e-upload-file">Upload
                                    file</label>
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none"
                                    aria-describedby="user_avatar_help" id="e-upload-file" type="file">

                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                        <button type="button" data-modal-toggle="modalEdit"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                save
                            </span>Simpan Informasi
                        </button>
                    </div>
                </div>
            </div>
        </div>


        {{-- MODAL DELETE --}}
        <div id="modalHapus" tabindex="-1"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="modalHapus">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu yakin ingin menghapus
                            data ini ?</h3>
                        <button data-modal-toggle="modalHapus" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Ya, Saya Yakin
                        </button>
                        <button data-modal-toggle="modalHapus" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Tidak,
                            Batalkan
                        </button>
                    </div>
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
        $(document).ready(function () {

            var table = $('#example').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection

