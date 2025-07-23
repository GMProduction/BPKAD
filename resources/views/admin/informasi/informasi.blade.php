@extends('admin.base')
@section('css')
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet"
        integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">
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

    <div class="panel-container pb-0">
        <div class="card  shadow-sm">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi Publik</li>
                </ol>
            </nav>
        </div>
        <!-- Konten lainnya -->
    </div>

    <div class="panel-container">
        <div class="panel bg-white border">
            <div class="border-b border-gray-200  mb-4">
                <ul class="nav nav-underline mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="berkala-tab" data-bs-toggle="tab" data-bs-target="#berkala"
                            type="button" role="tab" aria-controls="berkala" aria-selected="true">
                            Informasi Berkala
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sertamerta-tab" data-bs-toggle="tab" data-bs-target="#sertamerta"
                            type="button" role="tab" aria-controls="sertamerta" aria-selected="false">
                            Informasi Serta Merta
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="setiapsaat-tab" data-bs-toggle="tab" data-bs-target="#setiapsaat"
                            type="button" role="tab" aria-controls="setiapsaat" aria-selected="false">
                            Informasi Setiap Saat
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dikecualikan-tab" data-bs-toggle="tab" data-bs-target="#dikecualikan"
                            type="button" role="tab" aria-controls="dikecualikan" aria-selected="false">
                            Informasi Dikecualikan
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="publik-tab" data-bs-toggle="tab" data-bs-target="#publik"
                            type="button" role="tab" aria-controls="publik" aria-selected="false">
                            Daftar Informasi Publik
                        </button>
                    </li> --}}
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="dasarhukum-tab" data-bs-toggle="tab" data-bs-target="#dasarhukum"
                            type="button" role="tab" aria-controls="dasarhukum" aria-selected="false">
                            Dasar Hukum PPID
                        </button>
                    </li> --}}
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="berkala" role="tabpanel" aria-labelledby="berkala-tab">
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>Informasi yang wajib diperbaharui kemudian disediakan dan diumumkan kepada publik secara
                            berkala sekurang-kurangnya setiap 6 bulan sekali.</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-light" style="font-size: 0.8rem">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Informasi</th>
                                    <th scope="col" class="text-end">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_berkala as $v)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $v->name }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.information.periodic', ['slug' => $v->slug]) }}"
                                                class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="sertamerta" role="tabpanel" aria-labelledby="sertamerta-tab">
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>Informasi yang berkaitan dengan hajat hidup orang banyak dan ketertiban umum serta wajib
                            diumumkan secara serta merta tanpa penundaan.</div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-semibold mb-0">Informasi Serta Merta</p>
                        <button type="button" onclick="openModalTambah('informasi-serta-merta')" class=" bt-primary">
                            <span class="material-symbols-outlined me-1">add</span><span class="modal-title">Tambah
                                Informasi</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-data-serta-merta">
                            <thead class="table-light" style="font-size: 0.8rem">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Informasi</th>
                                    <th>Tahun</th>
                                    <th>Lampiran</th>
                                    <th class="text-end">Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_serta_merta as $v)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $v->information_category->name }}</td>
                                        <td>{{ $v->year }}</td>
                                        <td>
                                            @if ($v->type === 1)
                                                <a href="{{ $v->target }}" target="_blank">Download</a>
                                            @else
                                                <a href="{{ $v->target }}" target="_blank">Link</a>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="#" data-id="{{ $v->id }}"
                                                data-jenis="informasi-serta-merta" data-type="{{ $v->type }}"
                                                data-link="{{ $v->target }}"
                                                data-category="{{ $v->information_category_id }}"
                                                data-year="{{ $v->year }}"
                                                class="btn btn-sm btn-outline-primary btn-edit">Ubah</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="setiapsaat" role="tabpanel" aria-labelledby="setiapsaat-tab">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>
                            Informasi Setiap Saat adalah informasi yang harus disediakan oleh Badan Publik dan siap tersedia
                            untuk dapat langsung diberikan kepada Pemohon Informasi Publik ketika terdapat permohonan
                            terhadap Informasi Publik tersebut.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h5>Informasi Setiap Saat</h5>
                        <button type="button" class="btn bt-primary d-flex align-items-center"
                            onclick="openModalTambah('informasi-setiap-saat')">
                            Tambah Informasi Setiap Saat
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-light" style="font-size: 0.8rem">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Informasi</th>
                                    <th>Tahun</th>
                                    <th>Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_setiap_saat as $v)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $v->information_category->name }}</td>
                                        <td>{{ $v->year }}</td>
                                        <td>
                                            @if ($v->type === 1)
                                                <a href="{{ $v->target }}" target="_blank">Download</a>
                                            @else
                                                <a href="{{ $v->target }}" target="_blank">Link</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary btn-edit"
                                                data-id="{{ $v->id }}" data-jenis="informasi-setiap-saat"
                                                data-type="{{ $v->type }}" data-link="{{ $v->target }}"
                                                data-category="{{ $v->information_category_id }}"
                                                data-year="{{ $v->year }}">
                                                Ubah
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Dikecualikan -->
                <div class="tab-pane fade" id="dikecualikan" role="tabpanel" aria-labelledby="dikecualikan-tab">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>
                            Informasi yang tidak dapat diakses Pemohon Informasi Publik sesuai Undang-Undang Nomor 14 Tahun
                            2008 Tentang Keterbukaan Informasi Publik.
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h5>Informasi Dikecualikan</h5>
                        <button type="button" class="bt-primary d-flex align-items-center"
                            onclick="openModalTambah('informasi-di-kecualikan')"> Tambah Informasi Dikecualikan
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-light" style="font-size: 0.8rem">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Informasi</th>
                                    <th>Tahun</th>
                                    <th>Lampiran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_dikecualikan as $v)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $v->information_category->name }}</td>
                                        <td>{{ $v->year }}</td>
                                        <td>
                                            @if ($v->type === 1)
                                                <a href="{{ $v->target }}" target="_blank">Download</a>
                                            @else
                                                <a href="{{ $v->target }}" target="_blank">Link</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-primary btn-edit"
                                                data-id="{{ $v->id }}" data-jenis="informasi-di-kecualikan"
                                                data-type="{{ $v->type }}" data-link="{{ $v->target }}"
                                                data-category="{{ $v->information_category_id }}"
                                                data-year="{{ $v->year }}">
                                                Ubah
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Publik -->
                {{-- <div class="tab-pane fade" id="publik" role="tabpanel" aria-labelledby="publik-tab">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>

                        <div>
                            Daftar Informasi Publik.
                        </div>
                    </div>

                    <form id="formInformasiPublik" method="POST">
                        @csrf
                        <input name="id" type="hidden">
                        <input name="type_file" value="2" type="hidden">
                        <input name="service_type" value="3" type="hidden">

                        <div class="mb-3">
                            <label for="link-info" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link-info" name="url"
                                placeholder="Masukan Link Url" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="saveSetiap()">Simpan Perubahan</button>
                    </form>
                </div> --}}

                <!-- Tab: Dasar Hukum -->
                {{-- <div class="tab-pane fade" id="dasarhukum" role="tabpanel" aria-labelledby="dasarhukum-tab">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>
                            Dasar Hukum PPID
                        </div>
                    </div>

                    <form id="dasarhukum" method="POST">
                        @csrf
                        <input name="id" type="hidden">
                        <input name="type_file" value="2" type="hidden">
                        <input name="service_type" value="3" type="hidden">

                        <div class="mb-3">
                            <label for="link-info-dasarhukum" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link-info-dasarhukum" name="url"
                                placeholder="Masukan Link Url" required>
                        </div>
                        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div> --}}
                {{--
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="infoperaturan"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Peraturan
                </button>
                <ul class="dropdown-menu" aria-labelledby="infoperaturan">
                    <li>
                        <a class="dropdown-item" href="/admin/informasi/detailbyyear">Peraturan Daerah</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/informasi/detailbyyear">Peraturan Walikota</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/informasi/detailbyyear">Peraturan Lainnya</a>
                    </li>
                </ul>
            </div> --}}


                <!-- Modal Tambah (Bootstrap) -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Informasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" enctype="multipart/form-data" id="form-submit-information"
                                action="{{ route('admin.information.non-periodic.add') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="information_categories" class="form-label">Kategori Informasi</label>
                                        <div class="input-group">
                                            <select id="information_categories" name="category"
                                                class="form-select"></select>
                                            <button type="button" class="bt-secondary" onclick="openModalKategori()">
                                                Tambah Kategori
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Tahun</label>
                                        <select id="year" name="year" class="form-select">
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
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>

                                    <p class="form-text">Konten / Isi</p>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tr-konten"
                                                id="tr-link" value="link" checked onclick="switchtambahKonten()">
                                            <label class="form-check-label" for="tr-link">Link</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tr-konten"
                                                id="tr-file" value="file" onclick="switchtambahKonten()">
                                            <label class="form-check-label" for="tr-file">File</label>
                                        </div>
                                    </div>

                                    <div class="mb-3" id="div-tambahlink">
                                        <label for="link-info" class="form-label">Link</label>
                                        <input type="text" id="link-info" name="link" class="form-control"
                                            placeholder="Masukkan Link">
                                    </div>

                                    <div class="mb-3 d-none" id="div-tambahfile">
                                        <label for="upload-file" class="form-label">Upload File</label>
                                        <input type="file" id="upload-file" name="file" class="form-control"
                                            accept="application/pdf" onchange="checkSize(this)">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class=" bt-primary">
                                        Simpan Informasi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Kategori -->
                <div class="modal fade" id="modalTambahKategori" tabindex="-1"
                    aria-labelledby="modalTambahKategoriLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-kategori-title" id="modalTambahKategoriLabel">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" id="slug-information-name" name="slug">

                                <div class="mb-3">
                                    <label for="information_category_name" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="information_category_name"
                                        name="information_category_name" placeholder="Nama Kategori" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button id="btn-add-category" type="button" class="btn btn-primary">
                                    Simpan Kategori
                                </button>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal Delete (Bootstrap) -->
                <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="bi bi-exclamation-triangle fs-1 text-warning mb-3"></i>
                                <h5>Yakin ingin menghapus data ini?</h5>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-danger" id="confirmDelete">Ya, Hapus</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    @section('morejs')
        <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js"
            integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous">
        </script>

        <script>
            let modalTambahInst;

            document.addEventListener("DOMContentLoaded", function() {
                const modalEl = document.getElementById('modalTambah');
                modalTambahInst = new bootstrap.Modal(modalEl);
            });

            function openModalTambah(type) {

                let data_categories = [];
                let title = 'Tambah Informasi';
                let title_kategori = 'Tambah Kategori';

                $('#information_categories').empty();
                _informationType = type;

                switch (_informationType) {
                    case 'informasi-serta-merta':
                        data_categories = _sertaMertaCategories;
                        title = 'Tambah Informasi Serta Merta';
                        title_kategori = 'Tambah Kategori Serta Merta';
                        break;
                    case 'informasi-setiap-saat':
                        data_categories = _setiapSaatCategories;
                        title = 'Tambah Informasi Setiap Saat';
                        title_kategori = 'Tambah Kategori Setiap Saat';
                        break;
                    case 'informasi-di-kecualikan':
                        data_categories = _dikecualikanCategories;
                        title = 'Tambah Informasi DiKecualikan';
                        title_kategori = 'Tambah Kategori DiKecualikan';
                        break;
                }

                $('.modal-title').html(title);
                $('.modal-kategori-title').html(title_kategori);
                generateCategoryOption(data_categories);
                console.log('_sertaMertaCategories:', data_categories);

                // Tampilkan modal
                modalTambahInst.show();
            }
        </script>


        <script>
            var _informationType = '';
            var _sertaMertaCategories = @json($categories_serta_merta);
            var _setiapSaatCategories = @json($categories_setiap_saat);
            var _dikecualikanCategories = @json($categories_dikecualikan);

            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            const modalKategoriEl = document.getElementById('modalTambahKategori');
            const modalKategoriInst = new bootstrap.Modal(modalKategoriEl);

            async function addCategoryNonPeriodic() {
                try {
                    const url = '{{ route('admin.information.non-periodic.category') }}';
                    const slug = $('#slug-information-name').val();
                    const information_category_name = $('#information_category_name').val();
                    const response = await $.post(url, {
                        information_category_name,
                        slug
                    });
                    const payload = response.payload;

                    /* ––– simpan kategori dalam variabel global sesuai slug ––– */
                    switch (slug) {
                        case 'informasi-serta-merta':
                            _sertaMertaCategories = payload;
                            break;
                        case 'informasi-setiap-saat':
                            _setiapSaatCategories = payload;
                            break;
                        case 'informasi-di-kecualikan':
                            _dikecualikanCategories = payload;
                            break;
                    }
                    /* ––– render ulang <select> kategori di form utama ––– */
                    generateCategoryOption(payload); // helper milikmu
                    clearAddInformationCategory(); // bersihkan input

                    /* ––– feedback sukses ––– */
                    await Swal.fire({
                        title: 'Berhasil',
                        icon: 'success',
                        text: 'Kategori informasi berhasil ditambahkan!'
                    });

                    /* ––– tutup modal memakai Bootstrap ––– */
                    modalKategoriInst.hide();

                } catch (e) { // error dari server
                    const err = JSON.parse(e.responseText);
                    Swal.fire({
                        icon: 'error',
                        text: err.message || 'Terjadi kesalahan.'
                    });
                }
            }

            function generateCategoryOption(data, edit = false, category = '') {
                if (edit) {
                    let el = $("#information_categories_edit");
                    el.empty();
                    el.append('<option value="">Pilih Kategori Informasi</option>');
                    $.each(data, function(k, v) {
                        console.log(category);
                        if (v['id'] == category) {
                            el.append('<option value="' + v['id'] + '" selected>' + v['name'] + '</option>')
                        } else {
                            el.append('<option value="' + v['id'] + '">' + v['name'] + '</option>')
                        }
                    })
                } else {
                    let el = $("#information_categories");
                    el.empty();
                    el.append('<option value="" selected>Pilih Kategori Informasi</option>');

                    $.each(data, function(k, v) {
                        el.append('<option value="' + v.id + '">' + v.name + '</option>');
                    });
                }
            }

            function clearAddInformationCategory() {
                $('#information_category_name').val('');
                $('#slug-information-name').val('');
            }

            $(document).ready(function() {
                $('#table-data-serta-merta').DataTable();
                $('#table-data-setiap-saat').DataTable();
                $('#table-data-di-kecualikan').DataTable();
                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()


                $('#btn-add-category').on('click', function(e) {
                    addCategoryNonPeriodic();
                });

                $('#btn-submit-information').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi',
                        icon: 'info',
                        text: 'Yakin ingin menambah data informasi?',
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            $('#form-submit-information').submit();
                        }
                    });
                });

                $('#btn-patch').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi',
                        icon: 'info',
                        text: 'Yakin ingin merubah data informasi?',
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            $('#form-patch').submit();
                        }
                    });
                });

                $('.btn-edit').on('click', function(e) {
                    e.preventDefault();
                    let id = this.dataset.id;
                    $('#id-edit').val(id);
                    let jenis = this.dataset.jenis;
                    let year = this.dataset.year;
                    let category = this.dataset.category;
                    openModalEdit(jenis, year, category);
                })
            });

            /* ===== Tambah ===== */
            function switchTambahKonten() {
                const isLink = $('input[name="tr-konten"]:checked').val() === 'link';

                $('#div-tambahfile').toggleClass('d-none', isLink); // sembunyikan jika link
                $('#div-tambahlink').toggleClass('d-none', !isLink);
            }

            /* ===== Edit ===== */
            function switchEditKonten() {
                const isLink = $('input[name="er-konten"]:checked').val() === 'er-link';

                $('#div-editfile').toggleClass('d-none', isLink);
                $('#div-editlink').toggleClass('d-none', !isLink);
            }

            /* ====== Auto‑init saat radio diganti (optional) ====== */
            $(document).on('change', 'input[name="tr-konten"]', switchTambahKonten);
            $(document).on('change', 'input[name="er-konten"]', switchEditKonten);



            const modalEditElement = document.getElementById('modalEdit');
            // const modalEditInstance = new bootstrap.Modal(modalEditElement);

            function openModalEdit(type, year, category) {

                /* 1. Tentukan judul & sumber kategori ------------------*/
                let dataCategories = [];
                let title = 'Edit Informasi';

                switch (type) {
                    case 'informasi-serta-merta':
                        dataCategories = _sertaMertaCategories;
                        title = 'Edit Informasi Serta Merta';
                        break;

                    case 'informasi-setiap-saat':
                        dataCategories = _setiapSaatCategories;
                        title = 'Edit Informasi Setiap Saat';
                        break;

                    case 'informasi-di-kecualikan':
                        dataCategories = _dikecualikanCategories;
                        title = 'Edit Informasi Dikecualikan';
                        break;
                }

                /* 2. Render judul, option kategori & option tahun ------*/
                $('#title-modal-edit').text(title);
                $('#information_categories_edit').empty(); // bersihkan dulu
                generateCategoryOption(dataCategories, true, category); // helper milikmu
                generateYearEditOption(year); // helper milikmu

                /* 3. Tampilkan modal ----------------------------------*/
                modalEditInstance.show();
            }

            function generateYearEditOption(year) {
                let rangeYear = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026];
                let el = $("#year_edit");
                el.empty();
                el.append('<option value="">Pilih Kategori Informasi</option>');
                $.each(rangeYear, function(k, v) {
                    if (v == year) {
                        el.append('<option value="' + v + '" selected>' + v + '</option>')
                    } else {
                        el.append('<option value="' + v + '">' + v + '</option>')
                    }
                })
            }

            function closeModalEdit() {
                modaledit.hide();
            }


            function saveSetiap() {
                saveData('Simpan Data', 'formInformasiPublik')
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

            function closeModalTambah() {
                generateCategoryOption(data_categories);
                modaltambah.hide();
            }

            function openModalKategori() {
                $('#slug-information-name').val(_informationType);
                modalTambahInst.hide();
                modalKategoriInst.show();
            }

            function closeModalKategori() {
                modalTambahInst.show();
                modalKategoriInst.hide();
            }
        </script>
    @endsection
