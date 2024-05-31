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
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Aduan</a>
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
                            id="pengelola-aduan-tab" data-tabs-target="#pengelola-aduan" type="button" role="tab"
                            onclick="setTabs(1)" aria-controls="pengelola-aduan" aria-selected="false">SK Pengelola
                            Aduan
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="grafik-tab" data-tabs-target="#grafik" type="button" role="tab" onclick="setTabs(2)"
                            aria-controls="grafik" aria-selected="false">Grafik Pengelola Aduan
                        </button>
                    </li>


                </ul>
            </div>

            <div id="myTabContent">

                <div class=" p-4 rounded-lg hidden" id="pengelola-aduan" role="tabpanel"
                    aria-labelledby="pengelola-aduan-tab">

                    <div class="flex justify-between mb-3 items-end">
                        <p class=" font-semibold">SK Pengelola Aduan</p>
                        <button type="button" id="openModaltambahtahun"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                add
                            </span>Tambah Tahun
                        </button>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                            id="table-data">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tahun
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        File
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="bodyPublicService">
                                @foreach ($data as $datum)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $datum->year }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($datum->quarter_1 !== null)
                                                <a href="{{ $datum->quarter_1 }}" target="_blank">Download</a>
                                            @else
                                                -
                                            @endif
                                            <a href="#" data-quarter="1" data-id="{{ $datum->id }}"
                                                class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-edit-file">Edit</a>
                                            <a href="#" data-quarter="1" data-id="{{ $datum->id }}"
                                                class="font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-file">Hapus</a>
                                        </td>
                                        {{-- <td class="px-6 py-4">
                                            @if ($datum->quarter_2 !== null)
                                                <a href="{{ $datum->quarter_2 }}" target="_blank">Download</a>
                                            @else
                                                -
                                            @endif
                                            <a href="#" data-quarter="2" data-id="{{ $datum->id }}"
                                                class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-edit-file">Edit</a>
                                            <a href="#" data-quarter="2" data-id="{{ $datum->id }}"
                                                class="font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-file">Hapus</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($datum->quarter_3 !== null)
                                                <a href="{{ $datum->quarter_3 }}" target="_blank">Download</a>
                                            @else
                                                -
                                            @endif
                                            <a href="#" data-quarter="3" data-id="{{ $datum->id }}"
                                                class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-edit-file">Edit</a>
                                            <a href="#" data-quarter="3" data-id="{{ $datum->id }}"
                                                class="font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-file">Hapus</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($datum->quarter_4 !== null)
                                                <a href="{{ $datum->quarter_4 }}" target="_blank">Download</a>
                                            @else
                                                -
                                            @endif
                                            <a href="#" data-quarter="4" data-id="{{ $datum->id }}"
                                                class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-edit-file">Edit</a>
                                            <a href="#" data-quarter="3" data-id="{{ $datum->id }}"
                                                class="font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-file">Hapus</a>
                                        </td> --}}
                                        <td>
                                            <a href="#" data-id="{{ $datum->id }}"
                                                class="font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-year">Hapus
                                                Baris</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" p-4 rounded-lg  " id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
                    <div>
                        <div class="bg-green-100 p-2 mb-5 flex items-center rounded-md">
                            <span class="material-symbols-outlined text-green-700 mr-2">
                                info
                            </span>
                            <span class="text-sm text-green-700">Grafik Aduan
                            </span>
                        </div>
                        <div class="flex justify-between mb-3 items-end">
                            {{--                            <p class=" font-semibold">SK Pengelola Aduan</p> --}}
                            <button type="button" id="openModaltambahtahungrafik"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    add
                                </span>Tambah Tahun
                            </button>
                        </div>
                        <div class="relative overflow-x-auto w-full">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                id="table-data-grafik" style="width: 100%;">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Tahun
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Aduan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Sedang Dalam Proses
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Selesai
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tabelgrafik">
                                    @foreach ($dataCharts as $dataChart)
                                        <tr>
                                            <td>
                                                {{ $dataChart->year }}
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <input type="text" id="total-value-{{ $dataChart->id }}"
                                                        name="jumlah-aduan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-28 p-2.5 "
                                                        placeholder="Masukan Jumlah Aduan"
                                                        value="{{ $dataChart->total }}">
                                                    <a href="#" data-id="{{ $dataChart->id }}" data-field="total"
                                                        class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-change-total"
                                                        id="editData">Simpan</a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="flex">
                                                    <input type="text" id="process-value-{{ $dataChart->id }}"
                                                        name="jumlah-diproses"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-28 p-2.5 "
                                                        placeholder="Masukan Jumlah Aduan Diproses"
                                                        value="{{ $dataChart->process }}">
                                                    <a href="#" data-id="{{ $dataChart->id }}"
                                                        data-field="process"
                                                        class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-change-total"
                                                        id="editData">Simpan</a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="flex">
                                                    <input type="text" id="finish-value-{{ $dataChart->id }}"
                                                        name="jumlah-selesai"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-28 p-2.5 "
                                                        placeholder="Masukan Jumlah Selesai"
                                                        value="{{ $dataChart->finish }}">
                                                    <a href="#" data-id="{{ $dataChart->id }}" data-field="finish"
                                                        class="ml-5 font-small text-green-600 bg-green-100  button-link btn-edit btn-change-total"
                                                        id="editData">Simpan</a>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="#" data-id="{{ $dataChart->id }}"
                                                    class="ml-5 font-small text-red-600 bg-red-100  button-link btn-edit btn-drop-year-chart"
                                                    id="editData">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Bidang</label>
                                    <div class="flex">
                                        <input type="text" id="bidang-info" name="sector"
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

        <!-- Modal Tambah Tahun-->
        <div id="modalTambaht" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah Tahun
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
                    <form method="post" id="formTahun">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="year"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tahun</label>
                                    <div class="flex">
                                        <select id="year" name="year" required
                                            class="mr-3 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected value="">Pilih Tahun</option>
                                            @for ($x = 5; $x >= 1; $x--)
                                                <option
                                                    value="{{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}">
                                                    {{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}
                                                </option>
                                            @endfor
                                            <option value="{{ \Carbon\Carbon::now()->format('Y') }}">
                                                {{ \Carbon\Carbon::now()->format('Y') }}</option>
                                            @for ($x = 1; $x <= 5; $x++)
                                                <option value="{{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}">
                                                    {{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="submit" id="btn-submit-information"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    save
                                </span>Simpan Tahun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="modalTambahFile" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah File Tahun <span id="fieldTahun"></span>
                        </h3>
                        <button type="button" onclick="modalFile.hide()"
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
                    <form method="post" enctype="multipart/form-data"
                        action="{{ route('customize.aduan.change.file') }}" id="formFile">
                        @csrf
                        <input id="quarter-id" name="id" value="" hidden>
                        <input id="quarter-name" name="name" value="" hidden>
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="information_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">File
                                        <span id="textField"></span></label>
                                    <div class="flex">
                                        <input name="file" accept="image/jpeg, application/pdf"
                                            class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="small_size" type="file">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="submit" id="btn-submit-information"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    save
                                </span>Simpan File
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Tahun-->
        <div id="modalTambahtg" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah Tahun
                        </h3>
                        <button type="button" onclick="modaltg.hide()"
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
                    <form method="post" id="formTahunGrafik" action="{{ route('customize.aduan.chart') }}">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <div class="mb-3">
                                <div>
                                    <label for="year"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tahun</label>
                                    <div class="flex">
                                        <select id="year" name="year" required
                                            class="mr-3 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option selected value="">Pilih Tahun</option>
                                            @for ($x = 5; $x >= 1; $x--)
                                                <option
                                                    value="{{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}">
                                                    {{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}
                                                </option>
                                            @endfor
                                            <option value="{{ \Carbon\Carbon::now()->format('Y') }}">
                                                {{ \Carbon\Carbon::now()->format('Y') }}</option>
                                            @for ($x = 1; $x <= 5; $x++)
                                                <option value="{{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}">
                                                    {{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="submit" id="btn-submit-information"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    save
                                </span>Simpan Tahun
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
        var path = '/{{ request()->path() }}';
        var tableGrafik;
        let tabs = 1;
        const targetEl = document.getElementById('modalTambah');
        let modal = new Modal(targetEl, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        const targetElm = document.getElementById('modalTambaht');
        let modalt = new Modal(targetElm, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        const targetElmG = document.getElementById('modalTambahtg');
        let modaltg = new Modal(targetElmG, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        const targetElFile = document.getElementById('modalTambahFile');
        let modalFile = new Modal(targetElFile, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function() {
            datatable();
            datatableChart();
            eventEditFile();
            eventEditChart();
            eventDeleteFile();
            eventDeleteYear();
            eventDeleteChart();
            $('#myTab').on('show.bs.tab', function() {
                tableGrafik.columns.adjust();
            })
            // dataPublicService()
        });


        $(document).on('click', '#openModal', function() {
            modal.show();
        });

        $(document).on('click', '#openModaltambahtahun', function() {
            modalt.show();
        });

        $(document).on('click', '#openModaltambahtahungrafik', function() {
            modaltg.show();
        });

        function setTabs(x) {
            tabs = x
            tableGrafik.columns.adjust();
        }

        function datatable() {
            $('#table-data').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function datatableChart() {
            tableGrafik = $('#table-data-grafik').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function eventEditFile() {
            $('.btn-edit-file').on('click', function(e) {
                let elQuarter = $('#fieldTahun');
                let elYearID = $('#quarter-id');
                let elQuarterName = $('#quarter-name');
                elQuarter.empty();
                elYearID.val('');
                elQuarterName.val('');
                e.preventDefault();
                let dataQuarter = this.dataset.quarter;
                let dataYearID = this.dataset.id;
                let quarterName = 'Triwulan ' + dataQuarter;
                elQuarter.html(quarterName);
                elYearID.val(dataYearID);
                elQuarterName.val(dataQuarter);
                modalFile.show();
            });
        }

        function eventDeleteFile() {
            $('.btn-drop-file').on('click', function(e) {
                e.preventDefault();
                let dataQuarter = this.dataset.quarter;
                let dataYearID = this.dataset.id;
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menghapus file?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        deleteFileHandler(dataYearID, dataQuarter);
                    }
                });
            })
        }

        function eventDeleteYear() {
            $('.btn-drop-year').on('click', function(e) {
                e.preventDefault();
                let dataYearID = this.dataset.id;
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menghapus data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        deleteYearHandler(dataYearID);
                    }
                });
            })
        }

        function eventEditChart() {
            $('.btn-change-total').on('click', function(e) {
                e.preventDefault();
                let field = this.dataset.field;
                let id = this.dataset.id;
                let value = 0;
                switch (field) {
                    case 'total':
                        value = $('#total-value-' + id).val();
                        break;
                    case 'process':
                        value = $('#process-value-' + id).val();
                        break;
                    case 'finish':
                        value = $('#finish-value-' + id).val();
                        break;
                    default:
                        break;
                }
                changeChartHandler(id, field, value);
            })
        }

        function eventDeleteChart() {
            $('.btn-drop-year-chart').on('click', function(e) {
                e.preventDefault();
                let dataChartID = this.dataset.id;
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menghapus data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        deleteChartHandler(dataChartID);
                    }
                });
            })

        }
        async function deleteFileHandler(id, quarter) {
            try {
                let url = path + '/' + id + '/drop-file/' + quarter;
                await $.post(url);
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil menghapus data...',
                    icon: 'success',
                    timer: 700
                }).then(() => {
                    window.location.reload();
                })
            } catch (e) {
                let error_message = JSON.parse(e.responseText);
                Swal.fire('Error', error_message.message, 'error');
            }
        }

        async function deleteYearHandler(id) {
            try {
                let url = path + '/' + id + '/drop-year';
                await $.post(url);
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil menghapus data...',
                    icon: 'success',
                    timer: 700
                }).then(() => {
                    window.location.reload();
                })
            } catch (e) {
                let error_message = JSON.parse(e.responseText);
                Swal.fire('Error', error_message.message, 'error');
            }
        }

        async function changeChartHandler(id, field, value) {
            try {
                let url = path + '/chart/' + id + '/change/' + field;
                await $.post(url, {
                    value
                });
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil merubah data...',
                    icon: 'success',
                    timer: 700
                }).then(() => {
                    window.location.reload();
                })
            } catch (e) {
                let error_message = JSON.parse(e.responseText);
                Swal.fire('Error', error_message.message, 'error');
            }
        }

        async function deleteChartHandler(id) {
            try {
                let url = path + '/chart/' + id + '/drop-chart';
                await $.post(url);
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil menghapus data...',
                    icon: 'success',
                    timer: 700
                }).then(() => {
                    window.location.reload();
                })
            } catch (e) {
                let error_message = JSON.parse(e.responseText);
                Swal.fire('Error', error_message.message, 'error');
            }
        }
    </script>
    <script></script>
    <script></script>
@endsection
