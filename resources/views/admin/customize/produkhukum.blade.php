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
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="perda-tab" data-tabs-target="#perda" type="button" role="tab" onclick="setTabs(1)"
                            aria-controls="perda" aria-selected="false">Perda
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="perwali-tab" data-tabs-target="#perwali" type="button" role="tab" onclick="setTabs(2)"
                            aria-controls="perwali" aria-selected="false">Perwali
                        </button>
                    </li>

                </ul>
            </div>

            <div id="myTabContent">

                <div class=" p-4 rounded-lg hidden" id="perda" role="tabpanel" aria-labelledby="perda-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Produk Hukum Perda
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">PERDA</p>

                            </div>
                            <button type="button" id="openModalRegion"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah PERDA
                            </button>
                        </div>
                        <div class="overflow-x-auto shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500" id="table-region"
                                   style="width: 100%;">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            #
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Nama
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
                                @foreach($regions as $region)
                                    <tr>
                                        <td class="py-3 px-6">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td class="py-3 px-6">
                                            {{ $region->name }}
                                        </td>

                                        <td class="py-3 px-6">
                                            <a href="{{ $region->link }}">Download</a>
                                        </td>
                                        <td class="py-3 px-6">
                                            <span class="sr-only">Ubah</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class=" p-4 rounded-lg hidden" id="perwali" role="tabpanel" aria-labelledby="perwali-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md ">
                            <span class="material-symbols-outlined text-green-700 mr-2 ">
                                info
                            </span>
                            <span class="text-sm text-green-700 ">Produk Hukum Perwali
                            </span>
                        </div>

                        <div class="flex justify-between mb-3">
                            <div>
                                <p class=" font-semibold mb-2">PERWALI</p>

                            </div>
                            <button type="button" id="openModalMayor"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah PERWALI
                            </button>
                        </div>
                        <div class="overflow-x-auto shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500" id="table-mayor" style="width: 100%;">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 w-full">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            #
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Nama
                                        </th>

                                        <th scope="col" class="py-3 px-6">
                                            Link
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Ubah</span>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal Tambah PEERDA-->
        <div id="modalTambahPerda" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah Data Produk Hukum PERDA
                        </h3>
                        <button type="button" onclick="modal.hide()"
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
                    <form method="post" enctype="multipart/form-data" id="form-perda">
                        @csrf
                        <input type="hidden" name="type" value="region">
                        <input id="id" name="id" value="" hidden>
                        <input id="type_file" name="type_file" hidden>
                        <input name="service_type" hidden value="2">
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="nama-perda"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">PERDA</label>
                                    <div class="flex">
                                        <input type="text" id="nama-perda" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                            placeholder="Masukan Perda" required>
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
                                    <label for="link-url"
                                        class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                    <input type="text" id="link-url" name="url"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                        placeholder="Masukan Link">
                                </div>

                                <div class="mb-3  hidden" id="div-tambahfile">
                                    <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                        file</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none upload-file"
                                        aria-describedby="upload-file_help" id="upload-file" type="file"
                                        name="file" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="button" id="btn-submit-perda"
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


        <!-- Modal Tambah PERWALI-->
        <div id="modalTambahPerwali" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah Data Produk Hukum PERWALI
                        </h3>
                        <button type="button" onclick="modalt.hide()"
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
                    <form method="post" enctype="multipart/form-data" id="form-wali">
                        @csrf
                        <input type="hidden" name="type" value="mayor">
                        <input id="id" name="id" value="" hidden>
                        <input id="type_fileperwali" name="type_fileperwali" hidden>
                        <input name="service_type" hidden value="2">
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="information_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">PERWALI</label>
                                    <div class="flex">
                                        <input type="text" id="nama-perwali" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                            placeholder="Masukan Nama Perwali" required>
                                    </div>
                                </div>
                            </div>


                            <p class="text-sm pb-1">Konten / Isi</p>
                            <div class="border p-3 border-gray-200 rounded-lg">
                                <ul class="grid gap-6 w-full md:grid-cols-2 mb-5">
                                    <li>
                                        <input type="radio" id="tr-linkperwali" name="tr-konten"
                                            value="tr-linkperwali" class="hidden peer" required checked
                                            onclick="switchtambahKontenperwali()">
                                        <label for="tr-linkperwali"
                                            class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">Link</div>
                                                <div class="w-full text-center">Konten Menggunakan Link</div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="tr-fileperwali" name="tr-konten"
                                            value="tr-fileperwali" class="hidden peer"
                                            onclick="switchtambahKontenperwali()">
                                        <label for="tr-fileperwali"
                                            class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold text-center">File</div>
                                                <div class="w-full text-center">Konten dengan file (Max 2Mb)</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>

                                <div class="mb-3 " id="div-tambahlinkperwali">
                                    <label for="link-info"
                                        class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                    <input type="text" id="link-url" name="url"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                        placeholder="Masukan Link">
                                </div>

                                <div class="mb-3  hidden" id="div-tambahfileperwali">
                                    <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                        file</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none upload-file"
                                        aria-describedby="upload-file_help" id="upload-file" type="file"
                                        name="file" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="button" id="btn-submit-mayor"
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
    @if (\Illuminate\Support\Facades\Session::has('type'))
        <script>
            let type = "{{ \Illuminate\Support\Facades\Session::get('type') }}"
            let el = document.getElementById(type + '-tab');
            el.ariaSelected = 'true'
        </script>
    @endif
    <script>
        let tabs = 1;
        const targetEl = document.getElementById('modalTambahPerda');
        var tableRegion, tableMayor;
        let modal = new Modal(targetEl, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        const targetElm = document.getElementById('modalTambahPerwali');
        let modalt = new Modal(targetElm, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        function switchtambahKonten() {
            if (document.querySelector('input[name="tr-konten"]:checked').value == "tr-link") {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
                $('#type_file').val('2')
            } else {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
                $('#type_file').val('1')
            }
        }

        function switchtambahKontenperwali() {
            if (document.querySelector('input[name="tr-kontenperwali"]:checked').value == "tr-linkperwali") {
                document.querySelector('#div-tambahfileperwali').classList.add("hidden");
                document.querySelector('#div-tambahlinkperwali').classList.remove("hidden");
                $('#type_fileperwali').val('2')
            } else {
                document.querySelector('#div-tambahfileperwali').classList.remove("hidden");
                document.querySelector('#div-tambahlinkperwali').classList.add("hidden");
                $('#type_fileperwali').val('1')
            }
        }

        function setTabsModal(x) {
            if (x == 1) {
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
                $('#type_file').val('2')
                console.log('aytas')
            } else {
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
                $('#type_file').val('1')
                console.log('bbbb')
            }
        }

        function showPreview(event, div = "preview") {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById(div);
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function setTabs(x) {
            tabs = x;
            console.log(x);
            tableRegion.columns.adjust();
            tableMayor.columns.adjust();
        }

        function eventSwitchTab() {
            $('#myTab').on('shown.bs.tab', function(e) {
                console.log('test')
            });
        }

        function eventOpenModalRegion() {
            $('#openModalRegion').on('click', function() {
                modal.show();
            })
        }

        function eventOpenModalMayor() {
            $('#openModalMayor').on('click', function() {
                modalt.show();
            })
        }

        function datatableRegion() {
            tableRegion = $('#table-region').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function datatableMayor() {
            tableMayor = $('#table-mayor').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function eventSubmitRegion() {
            $('#btn-submit-perda').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menyimpan data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        // deleteChartHandler(dataChartID);
                        $('#form-perda').submit();
                    }
                });
            })
        }

        function eventSubmitMayor() {
            $('#btn-submit-mayor').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menyimpan data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        // deleteChartHandler(dataChartID);
                        $('#form-wali').submit();
                    }
                });
            })
        }

        $(document).ready(function () {
            datatableRegion();
            datatableMayor();
            eventOpenModalRegion();
            eventOpenModalMayor();
            eventSwitchTab();
            eventSubmitRegion();
            eventSubmitMayor();
        });

        $(document).on('click', '#editData', function(ev) {
            let id = $(this).data('id')
            let sector = $(this).data('sector')
            let typefile = $(this).data('typefile')
            let servicetype = $(this).data('servicetype')
            let url = $(this).data('url')
            $('#modalTambah #id').val(id)
            $('#modalTambah #bidang-info').val(sector)

            if (typefile == 1) {
                $('#tr-link').attr('checked', false);
                $('#tr-file').attr('checked', true);
                switchtambahKonten()
                $('#upload-file')
            } else {
                $('#tr-link').attr('checked', true);
                $('#tr-file').attr('checked', false);
                switchtambahKonten()
                $('#modalTambah #link-url').val(url)
            }
            modal.show();
        })
    </script>
    <script>
        jQuery.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
    </script>
@endsection
