@extends('admin.customize.base')
@section('css')
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet"
        integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">
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
    <div class="panel-container">

        <!-- ========= Tabs ========= -->
        <div class="panel bg-white border">
            <!-- Nav -->
            <ul class="nav nav-underline border-bottom mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tabs-btn active" id="pengelola-aduan-tab" data-bs-toggle="tab"
                        data-bs-target="#pengelola-aduan" type="button" role="tab" aria-controls="pengelola-aduan"
                        aria-selected="true" onclick="setTabs(1)">
                        SK Pengelola Aduan
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link tabs-btn" id="grafik-tab" data-bs-toggle="tab" data-bs-target="#grafik"
                        type="button" role="tab" aria-controls="grafik" aria-selected="false" onclick="setTabs(2)">
                        Grafik Pengelola Aduan
                    </button>
                </li>
            </ul>
            <!-- /Nav -->

            <!-- Tab panes (tetap sesuai kebutuhan Anda) -->
            <div class="tab-content p-4 border rounded-bottom" id="myTabContent">
                <!-- ===== SK Pengelola Aduan ===== -->
                <div class="tab-pane fade show active" id="pengelola-aduan" role="tabpanel"
                    aria-labelledby="pengelola-aduan-tab">
                    <!-- Heading + Tombol -->
                    <div class="d-flex align-items-end justify-content-between mb-3">
                        <p class="fw-semibold mb-0">SK Pengelola Aduan</p>

                        <button type="button" id="openModaltambahtahun" class="bt-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#modalTambaht">
                            <span class="material-symbols-outlined me-1">add</span> Tambah Tahun
                        </button>
                    </div>

                    <!-- Tabel -->
                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="table-data">
                            <thead class="table-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="bodyPublicService">
                                @foreach ($data as $datum)
                                    <tr>
                                        <td class="fw-medium">{{ $datum->year }}</td>

                                        <!-- File + Aksi -->
                                        <td>
                                            @if ($datum->quarter_1 !== null)
                                                <a href="{{ $datum->quarter_1 }}" target="_blank">Download</a>
                                            @else
                                                &mdash;
                                            @endif

                                            <a href="#" data-quarter="1" data-id="{{ $datum->id }}"
                                                class="button-link editbutton ms-3 btn-edit-file  ">Edit</a>

                                            <a href="#" data-quarter="1" data-id="{{ $datum->id }}"
                                                class="button-link deletebutton ms-2 btn-drop-file">Hapus</a>
                                        </td>

                                        <!-- Hapus baris -->
                                        <td class="actionButtonContainer">
                                            <a href="#" data-id="{{ $datum->id }}"
                                                class="button-link deletebutton btn-drop-year">Hapus Baris</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ===== Grafik Pengelola Aduan ===== -->
                <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="grafik-tab">
                    <!-- Header -->
                    <div class="alert alert-success d-flex align-items-center py-2 mb-4" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        Grafik Aduan
                    </div>

                    <div class="d-flex align-items-end justify-content-end mb-3">
                        <button type="button" id="openModaltambahtahungrafik" class="bt-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#modalTambahg">
                            <span class="material-symbols-outlined me-1">add</span> Tambah Tahun
                        </button>
                    </div>

                    <!-- Tabel Grafik -->
                    <div class="table-responsive">
                        <table class="table table-striped align-middle w-100" id="table-data-grafik">
                            <thead class="table-light">
                                <tr>
                                    <th>Tahun</th>
                                    <th>Jumlah Aduan</th>
                                    <th>Jumlah Sedang Dalam Proses</th>
                                    <th>Jumlah Selesai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="tabelgrafik">
                                @foreach ($dataCharts as $dataChart)
                                    <tr>
                                        <td>{{ $dataChart->year }}</td>

                                        <!-- Total -->
                                        <td class="py-2">
                                            <div class="d-flex">
                                                <input type="text" id="total-value-{{ $dataChart->id }}"
                                                    class="form-control form-control-sm w-25"
                                                    value="{{ $dataChart->total }}">
                                                <a href="#" data-id="{{ $dataChart->id }}" data-field="total"
                                                    class="button-link editbutton ms-3 btn-change-total">Simpan</a>
                                            </div>
                                        </td>

                                        <!-- Process -->
                                        <td class="py-2">
                                            <div class="d-flex">
                                                <input type="text" id="process-value-{{ $dataChart->id }}"
                                                    class="form-control form-control-sm w-25"
                                                    value="{{ $dataChart->process }}">
                                                <a href="#" data-id="{{ $dataChart->id }}" data-field="process"
                                                    class="button-link editbutton ms-3 btn-change-total">Simpan</a>
                                            </div>
                                        </td>

                                        <!-- Finish -->
                                        <td class="py-2">
                                            <div class="d-flex">
                                                <input type="text" id="finish-value-{{ $dataChart->id }}"
                                                    class="form-control form-control-sm w-25"
                                                    value="{{ $dataChart->finish }}">
                                                <a href="#" data-id="{{ $dataChart->id }}" data-field="finish"
                                                    class="button-link editbutton ms-3 btn-change-total">Simpan</a>
                                            </div>
                                        </td>

                                        <!-- Hapus -->
                                        <td>
                                            <a href="#" data-id="{{ $dataChart->id }}"
                                                class="button-link deletebutton btn-drop-year-chart">Hapus</a>
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

    <!-- ============ TAB PANES ============ -->

    <div id="dropdownperaturan"
        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul id="dropdownperaturan" class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="infoperaturan">
            <!-- tombol pemicu masih memakai id yang sama -->

            <li>
                <a class="dropdown-item" href="/admin/informasi/detailbyyear">
                    Peraturan Daerah
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/admin/informasi/detailbyyear">
                    Peraturan Walikota
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/admin/informasi/detailbyyear">
                    Peraturan Lainnya
                </a>
            </li>
        </ul>
    </div>

    <!-- ============  Modal Tambah ============ -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal-tambah">Tambah Informasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formSerta" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="type_file" name="type_file">
                    <input type="hidden" name="service_type" value="2">

                    <div class="modal-body">
                        <!-- Bidang -->
                        <div class="mb-3">
                            <label class="form-label" for="bidang-info">Bidang</label>
                            <input type="text" id="bidang-info" name="sector" class="form-control"
                                placeholder="Masukan Bidang" required>
                        </div>

                        <!-- Konten / Isi -->
                        <p class="small mb-2">Konten / Isi</p>
                        <div class="border rounded p-3">
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <input class="form-check-input d-none" type="radio" id="tr-link"
                                        name="tr-konten" value="tr-link" checked onclick="switchtambahKonten()">
                                    <label class="form-check-label w-100 border rounded p-3 text-center" for="tr-link">
                                        <strong>Link</strong><br><span class="small">Konten menggunakan link</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input d-none" type="radio" id="tr-file"
                                        name="tr-konten" value="tr-file" onclick="switchtambahKonten()">
                                    <label class="form-check-label w-100 border rounded p-3 text-center" for="tr-file">
                                        <strong>File</strong><br><span class="small">Konten dengan file (Max 2 MB)</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3" id="div-tambahlink">
                                <label class="form-label" for="link-url">Link</label>
                                <input type="text" id="link-url" name="url" class="form-control"
                                    placeholder="Masukan Link">
                            </div>

                            <div class="mb-3 d-none" id="div-tambahfile">
                                <label class="form-label" for="upload-file">Upload File</label>
                                <input class="form-control upload-file" id="upload-file" name="url" type="file"
                                    accept="application/pdf" onchange="checkSize(this)">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="bt-primary" id="btn-submit-information" onclick="saveSerta()">
                            <span class="material-symbols-outlined me-1">save</span> Simpan Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============  Modal Tambah Tahun (pengelola aduan) ============ -->
    <div class="modal fade" id="modalTambaht" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tahun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formTahun" method="POST">
                    @csrf
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

    <!-- ============  Modal Tambah File  ============ -->
    <div class="modal fade" id="modalTambahFile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah File Tahun <span id="fieldTahun"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formFile" method="POST" enctype="multipart/form-data"
                    action="{{ route('customize.aduan.change.file') }}">
                    @csrf
                    <input type="hidden" id="quarter-id" name="id">
                    <input type="hidden" id="quarter-name" name="name">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="small_size">File <span id="textField"></span></label>
                            <input class="form-control" type="file" id="small_size" name="file"
                                accept="image/jpeg,application/pdf">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="bt-primary">
                            <span class="material-symbols-outlined me-1">save</span> Simpan File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============  Modal Tambah Tahun (grafik) ============ -->
    <div class="modal fade" id="modalTambahtg" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tahun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formTahunGrafik" method="POST" action="{{ route('customize.aduan.chart') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="year-grafik">Tahun</label>
                            <select id="year-grafik" name="year" class="form-select" required>
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
@endsection

@section('morejs')
    <!-- jQuery -->
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
        var path = '/{{ request()->path() }}';
        var tableGrafik;
        let tabs = 1;


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

        const modalFileBS = new bootstrap.Modal(
            document.getElementById('modalTambahFile'), {
                backdrop: 'static'
            } // opsional: klik latar tak menutup
        );

        function eventEditFile() {
            // pakai event‑delegation supaya berlaku untuk elemen yang ditambah dinamis
            $(document).on('click', '.btn-edit-file', function(e) {
                e.preventDefault();

                // elemen target di dalam modal
                const $quarterText = $('#fieldTahun'); // span judul
                const $quarterId = $('#quarter-id'); // input hidden id
                const $quarterName = $('#quarter-name'); // input hidden quarter

                // reset nilai lama
                $quarterText.text('');
                $quarterId.val('');
                $quarterName.val('');

                // ambil data‑atribut dari tombol
                const quarter = $(this).data('quarter'); // contoh: "1"
                const yearId = $(this).data('id'); // contoh: 17

                // set nilai ke dalam modal
                $quarterText.text('Triwulan ' + quarter);
                $quarterId.val(yearId);
                $quarterName.val(quarter);

                // tampilkan modal
                modalFileBS.show();
            });
        }

        // panggil sekali
        eventEditFile();

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
