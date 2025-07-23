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
                    <li class="breadcrumb-item"><a href="{{ route('admin.information.index') }}">Informasi Publik</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Informasi</li>
                </ol>
            </nav>
        </div>
        <!-- Konten lainnya -->
    </div>

    <div class="panel-container">

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-semibold">Informasi Tentang Profil Badan Publik</h5>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambah"
                        class="bt-primary d-flex align-items-center">
                        Tambah Informasi
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-light text-uppercase">
                            <tr style="font-size: 0.8rem">
                                <th scope="col">#</th>
                                <th scope="col" class="text-start">Nama Informasi</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $v)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="text-start">{!! $v->information !!}</td>
                                    <td>
                                        @if ($v->type === 1)
                                            <a href="{{ $v->target }}" target="_blank"
                                                class="text-decoration-none">Download</a>
                                        @else
                                            <a href="{{ $v->target }}" target="_blank"
                                                class="text-decoration-none">Link</a>
                                        @endif
                                    </td>
                                    <td class="d-flex gap-3">
                                        <a href="#" data-id="{{ $v->id }}" data-type="{{ $v->type }}"
                                            data-link="{{ $v->target }}" data-information="{{ $v->information }}"
                                            class="btn btn-sm btn-outline-primary btn-edit">
                                            Ubah
                                        </a>

                                        <a href="#" class="btn btn-sm btn-outline-danger btn-delete"
                                            data-id="{{ $v->id }}">
                                            Hapus
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        {{-- MODAL TAMBAH --}}
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form id="form-save" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- header --}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahLabel">Tambah Informasi </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>

                        {{-- body --}}
                        <div class="modal-body">
                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="nama-info" class="form-label">Nama Informasi</label>
                                <input type="text" id="nama-info" name="information" class="form-control"
                                    placeholder="Masukkan Nama Informasi" required>
                            </div>

                            {{-- radio Link/File --}}
                            <p class="fw-bold mb-2">Konten / Isi</p>
                            <div class="border rounded p-3 mb-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="tr-konten" id="tr-link"
                                            value="link" checked onclick="switchtambahKonten()">
                                        <label class="form-check-label" for="tr-link">Link - menggunakan URL</label>
                                    </div>

                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="tr-konten" id="tr-file"
                                            onclick="switchtambahKonten()" value="file">
                                        <label class="form-check-label" for="tr-file">File - unggah berkas</label>
                                    </div>
                                </div>

                                {{-- input Link --}}
                                <div id="div-tambahlink" class="mb-3">
                                    <label for="link-info" class="form-label">Link</label>
                                    <input type="text" id="link-info" name="link" class="form-control"
                                        placeholder="Masukkan URL" required>
                                </div>

                                {{-- input File --}}
                                <div id="div-tambahfile" class="mb-3 d-none">
                                    <label for="upload-file" class="form-label">Upload File</label>
                                    <input class="form-control" type="file" id="upload-file" name="file"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>

                        {{-- footer --}}
                        <div class="modal-footer">
                            <button type="submit" class="bt-primary" id="btn-submit">
                                <i class="bi bi-save me-1"></i>Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form id="form-patch" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.information.public.patch') }}">
                        @csrf
                        <input type="hidden" name="id" id="id-edit">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel">Edit Informasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            {{-- Nama --}}
                            <div class="mb-3">
                                <label for="e-nama-info" class="form-label">Nama Informasi</label>
                                <input type="text" id="e-nama-info" name="information-edit" class="form-control"
                                    required>
                            </div>

                            <p class="fw-bold mb-2">Konten / Isi</p>
                            <div class="border rounded p-3 mb-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="er-konten" id="er-link"
                                            onclick="switcheditKonten()" value="link" checked>
                                        <label class="form-check-label" for="er-link">Link - menggunakan URL</label>
                                    </div>

                                    <div class="col-md-6 form-check">
                                        <input class="form-check-input" type="radio" name="er-konten" id="er-file"
                                            onclick="switcheditKonten()" value="file">
                                        <label class="form-check-label" for="er-file">File - unggah berkas</label>
                                    </div>
                                </div>

                                {{-- Link --}}
                                <div id="div-editlink" class="mb-3">
                                    <label for="e-link-info" class="form-label">Link</label>
                                    <input type="text" id="e-link-info" name="e-link-edit" class="form-control">
                                </div>

                                {{-- File --}}
                                <div id="div-editfile" class="mb-3 d-none">
                                    <label class="form-label" for="upload-file-edit">Upload File</label>
                                    <input class="form-control" type="file" id="upload-file-edit" name="file-edit"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btn-patch">
                                <i class="bi bi-save me-1"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
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
        const modalTambahInst = new bootstrap.Modal(document.getElementById('modalTambah'));
        const modalEditInst = new bootstrap.Modal(document.getElementById('modalEdit'));

        let table;

        // Toggle Link/File (tambah)
        function switchtambahKonten() {
            const isLink = document.getElementById('tr-link').checked;
            document.getElementById('div-tambahlink').classList.toggle('d-none', !isLink);
            document.getElementById('div-tambahfile').classList.toggle('d-none', isLink);
        }

        // Toggle Link/File (edit)
        function switcheditKonten() {
            const isLink = document.getElementById('er-link').checked;
            document.getElementById('div-editlink').classList.toggle('d-none', !isLink);
            document.getElementById('div-editfile').classList.toggle('d-none', isLink);
        }

        function generateDataTable() {
            table = $('#table-data').DataTable();
        }

        $(document).ready(function() {
            generateDataTable();
            $('#btn-submit').on('click', function(e) {
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
                        $('#form-save').submit();
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
                document.getElementById('id-edit').value = $(this).data('id');;
                document.getElementById('e-nama-info').value = $(this).data('information');
                document.getElementById('e-link-info').value = $(this).data('link') || '';

                // set radio & toggle
                if ($(this).data('type') === 1) {
                    document.getElementById('er-file').checked = true;
                } else {
                    document.getElementById('er-link').checked = true;
                }
                switcheditKonten();

                modalEditInst.show();
            })
        });


        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();

            const id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // kirim request delete ke server
                    $.post("{{ route('admin.information.delete') }}", {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        })
                        .done(function(response) {
                            Swal.fire('Berhasil!', 'Data berhasil dihapus.', 'success')
                                .then(() => location.reload());
                        })
                        .fail(function(xhr) {
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                        });
                }
            });
        });
    </script>
@endsection
