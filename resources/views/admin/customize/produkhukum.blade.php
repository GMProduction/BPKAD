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
                            id="perda-tab" data-tabs-target="#perda" type="button" role="tab" onclick="setTabs(2)"
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
                            <button type="button" id="openModal"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah PERDA
                            </button>
                        </div>
                        <div class="overflow-x-auto shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500" id="table-perda">
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
                            <button type="button" id="openModal"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah PERWALI
                            </button>
                        </div>
                        <div class="overflow-x-auto shadow-sm ">
                            <table class="w-full text-sm text-left text-gray-500" id="table-perwali">
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

                                </tbody>
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
                            Tambah Informasi
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
                    <form method="post" enctype="multipart/form-data" id="formSerta">
                        @csrf
                        <input id="id" name="id" value="">
                        <input id="type_file" name="type_file">
                        <input name="service_type" hidden value="2">
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="information_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">PERDA</label>
                                    <div class="flex">
                                        <input type="text" id="nama-perda" name="sector"
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
                                    <label for="link-info"
                                        class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                    <input type="text" id="link-url" name="url"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                        placeholder="Masukan Link">
                                </div>

                                <div class="mb-3  hidden" id="div-tambahfile">
                                    <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                        file</label>
                                    <input onchange="checkSize(this)"
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none upload-file"
                                        aria-describedby="upload-file_help" id="upload-file" type="file"
                                        name="url" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="button" id="btn-submit-information" onclick="saveSerta()"
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
                            Tambah Informasi
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
                    <form method="post" enctype="multipart/form-data" id="formSerta">
                        @csrf
                        <input id="id" name="id" value="">
                        <input id="type_file" name="type_file">
                        <input name="service_type" hidden value="2">
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="information_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">PERWALI</label>
                                    <div class="flex">
                                        <input type="text" id="nama-perwali" name="sector"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                            placeholder="Masukan Perwali" required>
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
                                    <input type="text" id="link-url" name="url"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                        placeholder="Masukan Link">
                                </div>

                                <div class="mb-3  hidden" id="div-tambahfile">
                                    <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Upload
                                        file</label>
                                    <input onchange="checkSize(this)"
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none upload-file"
                                        aria-describedby="upload-file_help" id="upload-file" type="file"
                                        name="url" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="button" id="btn-submit-information" onclick="saveSerta()"
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



        $(document).ready(function() {
            datatable()
            dataPublicService()
        })

        function switchtambahKonten() {
            if (document.querySelector('input[name="tr-konten"]:checked').value == "tr-link") {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
                $('#type_file').val('2')
                console.log('aytas')
            } else {
                console.log(document.querySelector('input[name="tr-konten"]:checked').value);
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
                $('#type_file').val('1')
                console.log('bbbb')
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

        $(document).on('click', '#openModal', function() {
            modal.show();
        })

        $(document).on('click', '#openModaltambahtahun', function() {
            modalt.show();
        })

        function setTabs(x) {
            tabs = x
        }

        function saveForm() {
            saveData('Simpan Data', 'formBerkala')
            return false;

        }

        function saveFormLayanan() {
            saveData('Simpan Data', 'formLayanan')
            return false;
        }

        function saveSetiap() {
            saveData('Simpan Data', 'formSetiap')
            return false;
        }

        function saveSerta() {
            saveData('Simpan Data', 'formSerta')
            return false;
        }

        function saveTahun() {
            saveData('Simpan Data', 'formTahun')
            return false;
        }

        function saveData(text, form) {
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: text,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#' + form).submit();
                }

            });
            return false;

        }

        function datatable() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: '{{ route('customize.layanan.datatable') }}',
                fnRowCallback: function(
                    nRow,
                    aData,
                    iDisplayIndex,
                    iDisplayIndexFull
                ) {
                    // debugger;
                    var numStart = this.fnPagingInfo().iStart;
                    var index = numStart + iDisplayIndexFull + 1;
                    // var index = iDisplayIndexFull + 1;
                    $("td:first", nRow).html(index);
                    return nRow;
                },
                columns: [{
                        className: "",
                        orderable: false,
                        defaultContent: "",
                        searchable: false
                    },
                    {
                        data: 'sector',
                        name: 'sector',
                        orderable: true
                    },
                    {
                        data: 'url',
                        name: 'url',
                        orderable: true,
                        render(data, x, row) {
                            if (row.type_file == 1) {
                                return '<a role="button" class="text-blue-500" href="' + data +
                                    '" target="_blank">File Pdf</a>'
                            }
                            return data;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })
        }

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
        function dataPublicService() {
            let table = $('#bodyPublicService')
            table.empty();
            $.get('{{ route('customize.layanan.masyarakat') }}', function(res, x, e) {
                if (e.status == 200) {
                    $.each(res, function(k, v) {
                        let quar1 = '-',
                            quar2 = '-',
                            quar3 = '-',
                            quar4 = '-';
                        if (v.quarter_1) {
                            quar1 = '<a target="_blank" href="' + v.quarter_1 + '"> (file)</a>'
                        }
                        if (v.quarter_2) {
                            quar2 = '<a target="_blank" href="' + v.quarter_2 + '"> (file)</a>'
                        }
                        if (v.quarter_3) {
                            quar3 = '<a target="_blank" href="' + v.quarter_3 + '"> (file)</a>'
                        }
                        if (v.quarter_4) {
                            quar4 = '<a target="_blank" href="' + v.quarter_4 + '"> (file)</a>'
                        }
                        table.append(
                            '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">' +
                            '   <th scope="row"  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> ' +
                            v.year + '' +
                            '  </th>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar1 + '' +
                            '    <a href="#" class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 1" data-name="quarter_1" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 1" data-name="quarter_1" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar2 + '' +
                            '    <a href="#"  class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 2" data-name="quarter_2" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#"  class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 2" data-name="quarter_2" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar3 + '' +
                            '    <a href="#" class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 3" data-name="quarter_3" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 3" data-name="quarter_3" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar4 + '' +
                            '    <a href="#" class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 4" data-name="quarter_4" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 4" data-name="quarter_4" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td><a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-id="' + v.id + '" id="DeleteFile">Hapus Baris</a></td>' +
                            '</tr>')
                    })
                }

            })
        }

        $(document).on('click', '#editFile', function() {
            let year = $(this).data('year');
            let id = $(this).data('id');
            let name = $(this).data('name');
            let tri = $(this).data('tri');
            console.log(tri)
            $('#modalTambahFile #fieldTahun').html(year)
            $('#modalTambahFile #textField').html(tri)
            $('#modalTambahFile #id').val(id)
            $('#modalTambahFile #name').val(name)
            modalFile.show()
        })

        function saveDataTahun() {
            saveDataForm('Tahun Layanan', 'formTahun', '{{ route('customize.layanan.masyarakat') }}', afterSaveData)
            return false;
        }

        function saveDataFile() {
            saveDataForm('File Layanan', 'formFile', '{{ route('customize.layanan.masyarakat.file') }}', afterSaveData)
            return false;
        }

        function afterSaveData() {
            dataPublicService()
            modalt.hide()
            modalFile.hide()
        }

        $(document).on('click', '#DeleteFile', function() {
            let year = $(this).data('year');
            let id = $(this).data('id');
            let name = $(this).data('name');
            let tri = $(this).data('tri');
            let form = {
                '_token': '{{ csrf_token() }}',
                id,
                name
            }
            let text = 'tahun ' + year
            if (tri) {
                text = 'file ' + tri + ' tahun ' + year
            }
            deleteDataForm(text, '{{ route('customize.layanan.masyarakat.delete') }}', form, afterSaveData)
        })

        function deleteDataForm(text, url, data, resposeSuccess) {
            console.log(data);
            Swal.fire({
                title: "Hapus Data",
                text: "Apa kamu yakin menghapus data " + text + " ?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((res) => {
                if (res) {
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: url,
                        async: true,
                        // processData: false,
                        // contentType: false,
                        headers: {
                            Accept: "application/json",
                        },
                        success: function(data, textStatus, xhr) {
                            console.log(data);

                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Data dihapus',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then((dat) => {
                                    if (resposeSuccess) {
                                        resposeSuccess(data);
                                    } else {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                swal(data["msg"]);
                            }
                            console.log(data);
                        },
                        complete: function(xhr, textStatus) {
                            console.log("Berhasil");
                        },
                        error: function(error, xhr, textStatus) {
                            // console.log("LOG ERROR", error.responseJSON.errors);
                            // console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                            // console.log(xhr.status);
                            // console.log(textStatus);
                            // console.log(error.responseJSON);
                            // swal(error.responseJSON.errors ? error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0] : error.responseJSON['message'] ? error.responseJSON['message'] : error.responseJSON['msg'] )
                            console.log();
                            console.log(xhr);
                            console.log(textStatus);
                            // swal(error.responseJSON.errors ? error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0] : error.responseJSON['message'] ? error.responseJSON['message'] : error.responseJSON['msg'] )
                            Swal.fire(
                                error.responseText ?
                                JSON.parse(error.responseText).message :
                                error.responseJSON["msg"]
                            );
                        },
                    });
                }
            });
            return false;
        }

        async function saveDataForm(title, form, url, resposeSuccess, image = null) {
            var form_data = new FormData($("#" + form)[0]);

            console.log(form_data);
            Swal.fire({
                title: title,
                text: "Apa kamu yakin ?",
                icon: "info",
                buttons: true,
                primariMode: true,
            }).then(async (res) => {
                if (res) {
                    if (image) {
                        if ($("#" + image).val()) {
                            let image1 = await handleImageUpload($("#" + image));
                            form_data.append("profile", image1, image1.name);
                        }
                    }
                    $.ajax({
                        type: "POST",
                        data: form_data,
                        url: url ?? window.location.pathname,
                        async: true,
                        processData: false,
                        contentType: false,
                        headers: {
                            Accept: "application/json",
                        },
                        success: function(data, textStatus, xhr) {
                            console.log(data);

                            if (xhr.status === 200) {
                                Swal.fire({
                                    icon: "success",
                                    title: "berhasil",
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then((dat) => {
                                    if (resposeSuccess) {
                                        resposeSuccess(data);
                                    } else {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire(data["msg"]);
                            }
                            console.log(data);
                        },
                        xhr: function() {
                            $("#progressbar").remove();
                            $("#" + form).append(
                                ' <div id="progressbar" class="w-full bg-gray-200 rounded-full dark:bg-gray-700">' +
                                '<div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"></div>' +
                                '</div>');
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener(
                                "progress",
                                function(evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = (evt.loaded / evt.total) *
                                            100;
                                        //Do something with upload progress here
                                        // console.log(percentComplete)
                                        $("#progressbar div")
                                            .attr("style", "width:" + percentComplete + "%")
                                            .html(parseInt(percentComplete) + "%");
                                        if (percentComplete === 100) {
                                            $("#progressbar div").addClass("bg-success");
                                        }
                                    }
                                },
                                false
                            );
                            return xhr;
                        },
                        // uploadProgress: function(event, position, total, percentComplete){
                        //     var percentVal = percentComplete + '%';
                        //     console.log(percentVal);
                        //     console.log(percentVal);
                        //
                        // },
                        complete: function(xhr, textStatus) {
                            $("#progressbar").remove();
                        },
                        error: function(error, xhr, textStatus) {
                            // console.log("LOG ERROR", error.responseJSON.errors);
                            // console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                            $("#progressbar").remove();
                            console.log(error);
                            console.log(textStatus);
                            Swal.fire(
                                JSON.parse(error.responseText).errors ?
                                JSON.parse(error.responseText).errors[
                                    Object.keys(JSON.parse(error.responseText).errors)[0]
                                ][0] :
                                JSON.parse(error.responseText)?.message ?
                                JSON.parse(error.responseText).message :
                                JSON.parse(error.responseText).msg ?
                                JSON.parse(error.responseText).msg :
                                error.responseJSON["msg"]
                            );
                            // swal(error.responseText ? JSON.parse(error.responseText).message : error.responseJSON['msg'] )
                        },
                    });
                }
            });
            return false;
        }
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
