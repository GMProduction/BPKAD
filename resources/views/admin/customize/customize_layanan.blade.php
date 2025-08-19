@extends('admin.customize.base')
@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet"
        integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content-customize')
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

    @php $current = now()->year; @endphp

    <div class="panel-container">

        <div class="panel bg-white border">
            <div class="border-bottom mb-4">
                <ul class="nav nav-underline" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="berkala-tab" data-bs-toggle="tab" data-bs-target="#berkala"
                            type="button" role="tab" onclick="setTabs(1)" aria-controls="berkala" aria-selected="true">
                            Maklumat Pelayanan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sertamerta-tab" data-bs-toggle="tab" data-bs-target="#sertamerta"
                            type="button" role="tab" onclick="setTabs(2)" aria-controls="sertamerta"
                            aria-selected="false">
                            Standar Pelayanan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="setiapsaat-tab" data-bs-toggle="tab" data-bs-target="#setiapsaat"
                            type="button" role="tab" onclick="setTabs(3)" aria-controls="setiapsaat"
                            aria-selected="false">
                            Survey Kepuasan Masyarakat
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="infolayanan-tab" data-bs-toggle="tab" data-bs-target="#infolayanan"
                            type="button" role="tab" onclick="setTabs(4)" aria-controls="infolayanan"
                            aria-selected="false">
                            Informasi Layanan
                        </button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="berkala" role="tabpanel" aria-labelledby="berkala-tab">
                    <div class="alert alert-success d-flex align-items-center small mb-4">
                        <span class="material-symbols-outlined me-2">info</span>
                        Maklumat Pelayanan
                    </div>
                    <form id="formBerkala" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" value="{{ $berkala != null ? $berkala->id : '' }}" hidden>
                        <input name="type_file" value="1" hidden>
                        <input name="service_type" value="1" hidden>

                        <label class="form-label text-muted">Gambar Maklumat Pelayanan</label>
                        <div class="mb-3 border border-dashed p-3 text-center rounded">
                            <img id="preview" class="img-fluid d-block mx-auto mb-2"
                                style="max-height: 141px; object-fit: contain;"
                                src="{{ $berkala != null ? $berkala->url : '' }}">
                            <input type="file" accept="image/*" onchange="showPreview(event)" name="url"
                                class="form-control">
                        </div>

                        @if ($errors->has('cover'))
                            <div class="text-danger small">{{ $errors->first('cover') }}</div>
                        @endif

                        <div class="text-end">
                            <button type="button" onclick="saveForm()" class="bt-primary">
                                <span class="material-symbols-outlined">save</span> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="sertamerta" role="tabpanel" aria-labelledby="sertamerta-tab">
                    <div class="alert alert-success d-flex align-items-center small mb-4">
                        <span class="material-symbols-outlined me-2">info</span>
                        Standar Pelayanan Masyarakat
                    </div>

                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <p class="fw-semibold mb-0">Standar Pelayanan Masyarakat</p>

                        <button type="button" class="bt-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            {{-- ID modal yang akan dibuka --}}
                            <span class="material-symbols-outlined">add</span>
                            Tambah SP
                        </button>
                    </div>

                    <div class="table-responsive shadow-sm">
                        <table class="table table-sm" id="table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Bidang</th>
                                    <th>Link</th>
                                    <th class="text-end">Ubah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="setiapsaat" role="tabpanel" aria-labelledby="setiapsaat-tab">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <p class="fw-semibold mb-0">Survey Kepuasan Masyarakat</p>
                        <button type="button" id="openModaltambahtahun" class="bt-primary" data-bs-toggle="modal"
                            data-bs-target="#modalTambahTahun">
                            <span class="material-symbols-outlined">add</span> Tambah Tahun
                        </button>
                    </div>

                    <div class="table-responsive shadow-sm">
                        <table class="table table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>Triwulan I</th>
                                    <th>Triwulan II</th>
                                    <th>Triwulan III</th>
                                    <th>Triwulan IV</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="bodyPublicService"></tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="infolayanan" role="tabpanel" aria-labelledby="infolayanan-tab">
                    <div class="alert alert-success d-flex align-items-center small mb-4">
                        <span class="material-symbols-outlined me-2">info</span>
                        Informasi Layanan
                    </div>
                    <form id="formLayanan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="id" value="{{ $layanan != null ? $layanan->id : '' }}" hidden>
                        <input name="type_file" value="1" hidden>
                        <input name="service_type" value="5" hidden>

                        <label class="form-label text-muted">Gambar Informasi Layanan</label>
                        <div class="mb-3 border border-dashed p-3 text-center rounded">
                            <img id="previewLayanan" class="img-fluid d-block mx-auto mb-2"
                                style="max-height: 141px; object-fit: contain;"
                                src="{{ $layanan != null ? $layanan->url : '' }}">
                            <input type="file" accept="image/*" onchange="showPreview(event, 'previewLayanan')"
                                name="url" class="form-control">
                        </div>

                        @if ($errors->has('cover'))
                            <div class="text-danger small">{{ $errors->first('cover') }}</div>
                        @endif

                        <div class="text-end">
                            <button type="button" onclick="saveFormLayanan()" class="bt-primary">
                                <span class="material-symbols-outlined">save</span> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- =====================  Modal Tambah  ===================== -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="title-modal-tambah">Tambah Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            onclick="modal.hide()"></button>
                    </div>

                    <form id="formSerta" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input id="id" name="id" hidden>
                        <input id="type_file" name="type_file" hidden>
                        <input name="service_type" value="2" hidden>

                        <div class="modal-body">
                            <input type="hidden" name="service_type" value="2">
                            <input type="hidden" name="type_file" value="2">

                            <!-- Bidang ----------------------------------------------------->
                            <div class="mb-3">
                                <label class="form-label" for="bidang-info">Bidang</label>
                                <input type="text" id="bidang-info" name="sector" class="form-control"
                                    placeholder="Masukan Bidang" required>
                            </div>

                            <!-- PILIH KONTEN --------------------------------------------->
                            <p class="small mb-2">Konten / Isi</p>
                            <div class="border rounded p-3">


                                <!-- Link -->
                                <div class="mb-3" id="div-tambahlink">
                                    <label class="form-label" for="link-url">Link</label>
                                    <input type="text" id="link-url" name="url" class="form-control"
                                        placeholder="Masukan Link">
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-submit-information" class="bt-primary" onclick="saveSerta()">
                                <span class="material-symbols-outlined me-1">save</span> Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- =====================  Modal Edit  ===================== -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="title-modal-edit">Ubah Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form -->
                    <form id="formSertaEdit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- kolom kunci -->
                        <input type="hidden" id="edit-id" name="id">
                        <input type="hidden" id="edit-type-file" name="type_file" value="2"><!-- link -->
                        <input type="hidden" name="service_type" value="2"><!-- tetap -->

                        <div class="modal-body">
                            <!-- Bidang ------------------------------------------------ -->
                            <div class="mb-3">
                                <label class="form-label" for="edit-bidang-info">Bidang</label>
                                <input type="text" id="edit-bidang-info" name="sector" class="form-control"
                                    placeholder="Masukan Bidang" required>
                            </div>

                            <!-- Konten / Isi ----------------------------------------- -->
                            <p class="small mb-2">Konten / Isi</p>
                            <div class="border rounded p-3">

                                <!-- Link -->
                                <div class="mb-3" id="div-edit-link">
                                    <label class="form-label" for="edit-link-url">Link</label>
                                    <input type="text" id="edit-link-url" name="url" class="form-control"
                                        placeholder="Masukan Link">
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="modal-footer">
                            <button type="button" class="bt-primary"
                                onclick="saveEdit()"><!-- gunakan fungsi yang sama -->
                                <span class="material-symbols-outlined me-1">save</span> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- =====================  Modal Tambah Tahun  ===================== -->
        <div class="modal fade" id="modalTambahTahun" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Tahun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            onclick="modalt.hide()"></button>
                    </div>

                    <form id="formTahun" method="POST" onsubmit="return saveDataTahun()">
                        @csrf
                        <input id="id" name="id" hidden>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="year">Tahun</label>
                                <select id="year" name="year" class="form-select" required>
                                    <option value="" selected>Pilih Tahun</option>
                                    @for ($x = 5; $x >= 1; $x--)
                                        <option value="{{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}">
                                            {{ \Carbon\Carbon::now()->add('-' . $x, 'year')->format('Y') }}
                                        </option>
                                    @endfor
                                    <option value="{{ \Carbon\Carbon::now()->format('Y') }}">
                                        {{ \Carbon\Carbon::now()->format('Y') }}</option>
                                    @for ($x = 1; $x <= 5; $x++)
                                        <option value="{{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}">
                                            {{ \Carbon\Carbon::now()->add($x, 'year')->format('Y') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="bt-primary">
                                <span class="material-symbols-outlined me-1">save</span> Simpan Tahun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ===== Modal Tambah File ===== -->
        <div class="modal fade" id="modalTambahFile" tabindex="-1" aria-labelledby="modalTambahFileLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahFileLabel">
                            Tambah File Tahun <span id="fieldTahun"></span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form -->
                    <form id="formFile" method="POST" enctype="multipart/form-data" onsubmit="return saveDataFile()">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="name" name="name">

                        <div class="modal-body">

                            <!-- File upload -->
                            <div class="mb-3">
                                <label class="form-label" for="small_size">
                                    File <span id="textField"></span>
                                </label>
                                <input class="form-control" type="file" id="small_size" name="file"
                                    accept="image/jpeg,application/pdf">
                            </div>

                        </div>

                        <!-- Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="bt-primary">
                                <span class="material-symbols-outlined me-1">save</span> Simpan File
                            </button>
                        </div>

                    </form>
                    <!-- /Form -->

                </div>
            </div>
        </div>
        <!-- /Modal Tambah File -->



    </div>
@endsection

@section('morejs')
    <!-- jQuery -->
    <!--Datatables -->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js"
        integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous">
    </script>
    @if (\Illuminate\Support\Facades\Session::has('type'))
        <script>
            let type = "{{ \Illuminate\Support\Facades\Session::get('type') }}"
            let el = document.getElementById(type + '-tab');
            el.ariaSelected = 'true'
        </script>
    @endif
    <script>
        let tabs = 1;
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

        function saveEdit() {
            saveData('Simpan perubahan ?', 'formSertaEdit')
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


                rowCallback: function(row, data, displayIndex, displayIndexFull) {
                    // info() → { start : index baris pertama di halaman }
                    const pageInfo = this.api().page.info();
                    const number = pageInfo.start + displayIndex + 1; // 1‑based
                    $('td:eq(0)', row).html(number); // kolom pertama
                },

                columns: [{ // kolom nomor
                        data: null,
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
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
                        render(data, type, row) {
                            // type_file == 1 ⇒ file PDF, selain itu ⇒ link biasa
                            return (row.type_file === 1) ?
                                `<a href="${data}" target="_blank" class="text-blue-500">File PDF</a>` :
                                data;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
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
                            quar1 = '<a target="_blank" href="' + v.quarter_1 + '"> (lihat file)</a>'
                        }
                        if (v.quarter_2) {
                            quar2 = '<a target="_blank" href="' + v.quarter_2 + '"> (lihat file)</a>'
                        }
                        if (v.quarter_3) {
                            quar3 = '<a target="_blank" href="' + v.quarter_3 + '"> (lihat file)</a>'
                        }
                        if (v.quarter_4) {
                            quar4 = '<a target="_blank" href="' + v.quarter_4 + '"> (lihat file)</a>'
                        }
                        table.append(
                            '<tr class="bg-white border-b ">' +
                            '   <th scope="row"  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "> ' +
                            v.year + '' +
                            '  </th>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar1 + '' +
                            '    <a href="#" class="editbutton" data-year="' +
                            v.year + '" data-tri="Triwulan 1" data-name="quarter_1" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="editbutton" data-year="' +
                            v.year + '" data-tri="Triwulan 1" data-name="quarter_1" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar2 + '' +
                            '    <a href="#"  class="editbutton" data-year="' +
                            v.year + '" data-tri="Triwulan 2" data-name="quarter_2" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#"  class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 2" data-name="quarter_2" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar3 + '' +
                            '    <a href="#" class="editbutton" data-year="' +
                            v.year + '" data-tri="Triwulan 3" data-name="quarter_3" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 3" data-name="quarter_3" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="px-6 py-4">' +
                            '    ' + quar4 + '' +
                            '    <a href="#" class="editbutton" data-year="' +
                            v.year + '" data-tri="Triwulan 4" data-name="quarter_4" data-id="' + v.id +
                            '" id="editFile">Ubah</a>' +
                            '    <a href="#" class="font-small text-red-600 bg-red-100  button-link btn-edit" data-year="' +
                            v.year + '" data-tri="Triwulan 4" data-name="quarter_4" data-id="' + v.id +
                            '" id="DeleteFile">Hapus</a>' +
                            '</td>' +
                            '<td class="actionButtonContainer px-6 py-4"><a href="#" class="deletebutton"  data-year="' +
                            v.year + '" data-id="' + v.id + '" id="DeleteFile">Hapus Baris</a></td>' +
                            '</tr>')
                    })
                }

            })
        }


        const modalFile = new bootstrap.Modal(
            document.getElementById('modalTambahFile'), {
                backdrop: 'static'
            } // opsional: tak bisa di‑click luar
        );


        $(document).on('click', '#editFile', function() {

            const $btn = $(this); // tombol yang diklik
            const year = $btn.data('year');
            const id = $btn.data('id');
            const name = $btn.data('name');
            const tri = $btn.data('tri'); // triwulan

            // isi field di dalam modal
            $('#modalTambahFile #fieldTahun').text(year);
            $('#modalTambahFile #textField').text(tri);
            $('#modalTambahFile #id').val(id);
            $('#modalTambahFile #name').val(name);

            modalFile.show(); // tampilkan modal
        });

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

        /**
         * @param {String} label  – nama data yang akan ditampilkan di dialog
         * @param {String} url    – endpoint penghapusan
         * @param {Object} payload – data (id, _token, dll.) yang dikirimkan
         * @param {Function} [onSuccess] – callback optional setelah sukses
         */
        function deleteDataForm(label, url, payload, onSuccess) {

            Swal.fire({
                title: 'Hapus Data',
                text: `Apa kamu yakin menghapus data ${label} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33'
            }).then(result => {

                // ── batal ────────────────────────────────────────────────
                if (!result.isConfirmed) return;

                // ── lanjut hapus ─────────────────────────────────────────
                $.ajax({
                    type: 'POST', // atau 'DELETE' bila di‑spoof
                    url: url,
                    data: payload, // pastikan payload berisi _token & id
                    headers: {
                        Accept: 'application/json'
                    },

                    success(resp) {
                        Swal.fire({
                            title: 'Data dihapus',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000
                        }).then(() => {
                            if (typeof onSuccess === 'function') {
                                onSuccess(resp);
                            } else {
                                window.location.reload();
                            }
                        });
                    },

                    error(xhr) {
                        let msg = 'Terjadi kesalahan';
                        if (xhr.responseJSON) {
                            const r = xhr.responseJSON;
                            msg = r.message || r.msg || msg;
                        }
                        Swal.fire('Gagal', msg, 'error');
                    }
                });
            });

            return false; // mencegah aksi default <a> / <button>
        }


        async function saveDataForm(title, form, url, responseSuccess, imageInputId = null) {
            const formData = new FormData(document.getElementById(form));

            // ───────────────────── SWEETALERT2 CONFIRM ─────────────────────
            const result = await Swal.fire({
                title: title,
                text: 'Apa kamu yakin?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, simpan',
                cancelButtonText: 'Batal'
            });

            // Jika Batal, hentikan fungsi
            if (!result.isConfirmed) return;

            // ───────────────────── PERSIAPKAN DATA ─────────────────────────
            if (imageInputId) {
                const inputFile = document.getElementById(imageInputId);
                if (inputFile && inputFile.files.length) {
                    const img = await handleImageUpload($(inputFile));
                    formData.append('profile', img, img.name);
                }
            }

            // ───────────────────── AJAX SUBMIT ─────────────────────────────
            $.ajax({
                type: 'POST',
                url: url || window.location.pathname,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    Accept: 'application/json'
                },

                xhr() {
                    // progress‑bar
                    $('#progressbar').remove();
                    $('#' + form).append(
                        `<div id="progressbar" class="w-full bg-gray-200 rounded-full">
                   <div class="bg-blue-600 text-xs text-center p-0.5 leading-none rounded-full"></div>
                 </div>`
                    );
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', (evt) => {
                        if (evt.lengthComputable) {
                            const pc = (evt.loaded / evt.total) * 100;
                            $('#progressbar div').css('width', pc + '%').html(Math.floor(pc) + '%');
                        }
                    });
                    return xhr;
                },

                success(data, _status, xhr) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {
                        if (typeof responseSuccess === 'function') {
                            responseSuccess(data);
                        } else {
                            window.location.reload();
                        }
                    });
                },

                error(xhr) {
                    let msg = 'Terjadi kesalahan';
                    if (xhr.responseJSON) {
                        const r = xhr.responseJSON;
                        if (r.errors) { // validation error
                            const first = Object.keys(r.errors)[0];
                            msg = r.errors[first][0];
                        } else if (r.message) {
                            msg = r.message;
                        } else if (r.msg) {
                            msg = r.msg;
                        }
                    }
                    Swal.fire('Gagal', msg, 'error');
                },

                complete() {
                    $('#progressbar').remove();
                }
            });

            return false; // mencegah submit form biasa
        }
    </script>

    <script>
        /**
         * Buka modalEdit dan isikan field‐fieldnya.
         * Panggil openEdit({...}) saat user menekan tombol “Ubah”.
         *
         * @param {Object}  data
         * @param {Number}  data.id          – primary key
         * @param {String}  data.sector      – nama bidang
         * @param {String}  data.url         – link (atau kosong jika belum ada)
         * @param {Number}  data.type_file   – 1 = file PDF, 2 = link (dsb)
         */
        function openEdit(data) {
            // ─── isi form ──────────────────────────────────────────────────────────────
            document.getElementById('edit-id').value = data.id ?? '';
            document.getElementById('edit-type-file').value = data.type_file ?? 2; // default “link”
            document.getElementById('edit-bidang-info').value = data.sector ?? '';
            document.getElementById('edit-link-url').value = data.url ?? '';

            // rubah judul bila perlu
            document.getElementById('title-modal-edit').textContent = 'Ubah Informasi – ' + (data.sector || '');

            // ─── tampilkan modal ───────────────────────────────────────────────────────
            const modalEl = document.getElementById('modalEdit');
            const modalInst = bootstrap.Modal.getOrCreateInstance(modalEl); // BS 5
            modalInst.show();
        }

        /*  contoh pemakaian (dalam datatable “Ubah”)
           <a href="#" onclick="openEdit({id: 15, sector: 'Bidang A', url: 'https://link.com', type_file: 2})">
              Ubah
           </a>
        */
    </script>

    <script>
        $(document).on('click', '.deletebutton', function(e) {
            e.preventDefault();

            const id = $(this).data('id');

            Swal.fire({
                    title: 'Yakin hapus?',
                    text: 'Data "' + name + '" akan dihapus permanen.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '{{ route('customize.service.delete') }}',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id
                            },
                            beforeSend() {
                                Swal.showLoading();
                            },
                            success(res) {
                                Swal.close();

                                if (res.status === 200) {
                                    Swal.fire('Terhapus!', res.message, 'success');
                                    $('#table').DataTable().ajax.reload(null,
                                        false); // refresh tanpa reset paging
                                } else {
                                    Swal.fire('Gagal', res.message, 'error');
                                }
                            },
                            error(xhr) {
                                Swal.close();
                                Swal.fire('Error', 'Terjadi kesalahan server', 'error');
                            }
                        });

                    }
                });
        });
    </script>
@endsection
