@extends('admin.base')
@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ \Illuminate\Support\Facades\Session::get('success') }}"
            })
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire({
                icon: "error",
                text: "{{ \Illuminate\Support\Facades\Session::get('failed') }}"
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            @if ($errors->has('file-edit'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('file-edit') }}"
                })
            @endif
            @if ($errors->has('e-link-edit'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('e-link-edit') }}"
                })
            @endif

            @if ($errors->has('link'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('link') }}"
                })
            @endif
            @if ($errors->has('file'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('file') }}"
                })
            @endif
        </script>
    @endif
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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Layanan</a>
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
                            aria-controls="berkala" aria-selected="false">Maklumat Pelayanan
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="sertamerta-tab" data-tabs-target="#sertamerta" type="button" role="tab"
                            aria-controls="sertamerta" aria-selected="false">Standar Pelayanan
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="setiapsaat-tab" data-tabs-target="#setiapsaat" type="button" role="tab"
                            aria-controls="setiapsaat" aria-selected="false">Survey Kepuasan Masyarakat
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
                            <span class="text-sm text-green-700">Maklumat Pelayanan

                            </span>
                        </div>
                        <div class="overflow-x-auto relative shadow-sm ">
                            <div x-data="showImage()" class="w-full">
                                <div class="mb-6">
                                    <div>
                                        <label class="inline-block mb-2 text-gray-500">Gambar Maklumat Pelayanan</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label
                                                class="flex flex-col w-full border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                                <div class="relative flex flex-col items-center justify-center pt-7">
                                                    <img id="preview"
                                                        class="absolute inset-0 h-[141px] mx-auto object-fit">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p
                                                        class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                        pilih foto</p>
                                                </div>
                                                <input type="file" class="opacity-0" accept="image/*" name="cover" />
                                            </label>
                                        </div>
                                        @if ($errors->has('cover'))
                                            <span
                                                class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                {{ $errors->first('cover') }}
                                            </span>
                                        @endif

                                        <button type="button" onclick="openModalTambah('informasi-di-kecualikan')"
                                            class="max-h-[47px] ml-auto flex items-center mt-10 text-white bg-primary hover:bg-primarylight focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none max">
                                            Simpan Perubahan
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" p-4 rounded-lg hidden" id="sertamerta" role="tabpanel" aria-labelledby="sertamerta-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Standar Pelayanan Masyarakat
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">Standar Pelayanan Masyarakat</p>

                            </div>
                            <button type="button" data-modal-target="modalTambah" data-modal-toggle="modalTambah"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah SP
                            </button>
                        </div>
                        <div class="overflow-x-auto relative shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500  " id="table-data-serta-merta">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            #
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Bidang
                                        </th>

                                        <th scope="col" class="py-3 px-6">
                                            Link
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Ubah</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

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
                            <span class="text-sm text-green-700 ">Survey Kepuasan Masyarakat
                            </span>
                        </div>
                        <div class="mb-3 ">
                            <label for="link-info" class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                            <input type="text" id="link-info" name="link"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                required value="" placeholder="Masukan Link Url">
                        </div>
                        <button type="button"
                            class="max-h-[47px] ml-auto flex items-center mt-10 text-white bg-primary hover:bg-primarylight focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none max">
                            Simpan Perubahan
                        </button>
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
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah Informasi
                        </h3>
                        <button type="button" data-modal-hide="modalTambah"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center ">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" id="form-submit-information"
                        action="{{ route('admin.information.non-periodic.add') }}">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="information_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Bidang</label>
                                    <div class="flex">
                                        <input type="text" id="bidang-info" name="link"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                            placeholder="Masukan Bidang" required>
                                    </div>
                                </div>
                            </div>



                            <p class="text-sm pb-1">Konten / Isi</p>
                            <div class="border p-3 border-gray-200 rounded-lg">
                                <ul class="grid gap-6 w-full md:grid-cols-2 mb-5">
                                    <li>
                                        <input type="radio" id="tr-link" name="tr-konten" value="tr-link"
                                            class="hidden peer" required checked onclick="switchtambahKonten()">
                                        <label for="tr-link"
                                            class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">Link</div>
                                                <div class="w-full text-center">Konten Menggunakan Link</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="tr-file" name="tr-konten" value="tr-file"
                                            class="hidden peer" onclick="switchtambahKonten()">
                                        <label for="tr-file"
                                            class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">File</div>
                                                <div class="w-full text-center">Konten dengan file (Max 2Mb)</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>

                                <div class="mb-3 " id="div-tambahlink">
                                    <label for="link-info"
                                        class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                    <input type="text" id="link-info" name="link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                        placeholder="Masukan Link" required>
                                </div>

                                <div class="mb-3  hidden" id="div-tambahfile">
                                    <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                        file</label>
                                    <input onchange="checkSize(this)"
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none upload-file"
                                        aria-describedby="upload-file_help" id="upload-file" type="file"
                                        name="file" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="submit" id="btn-submit-information"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    save
                                </span>Simpan Informasi
                            </button>
                        </div>
                    </form>
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
        function switchtambahKonten() {
            if (document.querySelector('input[name="tr-konten"]:checked').value == "tr-link") {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");

            } else {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
            }
        }
    </script>
@endsection
