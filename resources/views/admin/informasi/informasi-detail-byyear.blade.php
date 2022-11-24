@extends('admin.base')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <a href="/admin/informasi"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Informasi</a>
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
                        <a href="#"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Informasi
                            Detail</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="panel bg-white border">
            <div class="flex justify-between mb-3">
                <p class=" font-semibold">{{ $title }}</p>
                <button type="button" data-modal-toggle="modalTambah"
                        class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                    <span class="material-symbols-outlined text-white mr-3">
                        add
                    </span>Tambah Informasi
                </button>
            </div>
            <div class="overflow-x-auto relative shadow-sm ">
                <table class="w-full text-sm text-left text-gray-500 " id="table-data">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nama Informasi
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tahun
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Lampiran
                        </th>

                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Ubah</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $v)
                        <tr class="bg-white border-b ">
                            <th class="text-center">
                                {{ $loop->index + 1 }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $v->program_activity->document }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $v->year }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $v->target }}
                            </th>

                            <td class="py-4 px-6 text-right">
                                <a href="#" data-modal-toggle="modalEdit"
                                   class="font-medium text-blue-600  button-link">Ubah</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <p>Data Belum Tersedia</p>
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
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
                        <button type="button" data-modal-toggle="modalTambah"
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
                    <!-- Modal body -->
                    <div class="p-6 ">

                        <div class="mb-3">
                            <div>
                                <label for="countries"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategori
                                    Informasi</label>
                                <div class="flex">
                                    <select id="countries"
                                            class="mr-3 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Pilih Kategori Informasi</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->document }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" data-modal-toggle="modalTambah" onclick="modal.show();"
                                            data-tooltip-target="tooltip-default"
                                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  transition duration-300  focus:outline-none ">
                                        <span class="material-symbols-outlined text-white">
                                            add
                                        </span>
                                    </button>


                                    <div id="tooltip-default" role="tooltip"
                                         class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip ">
                                        Tombol Tambah kategori (untuk tambah data yang belum terdaftar pada pilihan
                                        kategori
                                        di samping)
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="countries"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tahun</label>

                            <select id="tahun"
                                    class="mr-3 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Pilih Tahun</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
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
                                            <div class="w-full text-center">Konten dengan file</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>

                            <div class="mb-3 " id="div-tambahlink">
                                <label for="link-info"
                                       class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                <input type="text" id="link-info"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                       placeholder="Masukan Email Anda" required>
                            </div>

                            <div class="mb-3  hidden" id="div-tambahfile">
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

        <!-- Modal Tambah Kategori-->
        <div id="modalTambahKategori" tabindex="-2" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Tambah Kategori
                        </h3>
                        <button type="button" data-modal-toggle="modalTambah" onclick="modal.hide();"
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
                    <!-- Modal body -->
                    <div class="p-6 ">

                        <div class="mb-3">
                            <label for="namakategori-add" class="block mb-2 text-sm font-medium text-gray-700 ">Nama
                                Kategori</label>
                            <input type="text" id="namakategori-add"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                   placeholder="Masukan Email Anda" required>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                        <button type="button" data-modal-toggle="modalTambah" onclick="modal.hide();"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                save
                            </span>Simpan Kategori
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
                            <ul class="grid gap-6 w-full md:grid-cols-2 mb-5">
                                <li>
                                    <input type="radio" id="er-link" name="er-konten" value="er-link"
                                           class="hidden peer" required checked onclick="switcheditKonten()">
                                    <label for="er-link"
                                           class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold text-center">Link</div>
                                            <div class="w-full text-center">Konten Menggunakan Link</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="er-file" name="er-konten" value="er-file"
                                           class="hidden peer" onclick="switcheditKonten()">
                                    <label for="er-file"
                                           class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold text-center">File</div>
                                            <div class="w-full text-center">Konten dengan file</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>

                            <div class="mb-3 " id="div-editlink">
                                <label for="link-info"
                                       class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                                <input type="text" id="link-info"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                                       placeholder="Masukan Email Anda" required>
                            </div>

                            <div class="mb-3  hidden" id="div-editfile">
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
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- jQuery -->
    <script>
        let table;

        function switchtambahKonten() {
            if (document.querySelector('input[name="tr-konten"]:checked').value == "tr-link") {
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
            } else {
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
            }
        }

        function switcheditKonten() {
            if (document.querySelector('input[name="er-konten"]:checked').value == "er-link") {
                document.querySelector('#div-editfile').classList.add("hidden");
                document.querySelector('#div-editlink').classList.remove("hidden");
            } else {
                document.querySelector('#div-editfile').classList.remove("hidden");
                document.querySelector('#div-editlink').classList.add("hidden");
            }
        }

        function generateDataTable() {
            table = $('#table-data').DataTable();
        }

        $(document).ready(function () {
            generateDataTable();
        });
    </script>
@endsection
