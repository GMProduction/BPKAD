@extends('admin.base')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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


        <div class="card shadow-sm">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom mb-4">
                <h5 class="mb-0 fw-semibold">{{ $category->name }}</h5>
                <button type="button" class="bt-primary d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#modalTambah">
                    Tambah Informasi
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 mt-5" id="table-data">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Informasi</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Lampiran</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $v->information_category->name }}</td>
                                <td>{{ $v->year }}</td>
                                <td class="text-center">
                                    @if ($v->type === 1)
                                        <a href="{{ $v->target }}" class="text-success" target="_blank">Download</a>
                                    @else
                                        <a href="{{ $v->target }}" class="text-primary" target="_blank">Link</a>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-outline-primary btn-edit"
                                        data-id="{{ $v->id }}" data-type="{{ $v->type }}"
                                        data-link="{{ $v->target }}" data-category="{{ $v->information_category_id }}"
                                        data-year="{{ $v->year }}">
                                        Ubah
                                    </a>

                                    <button type="button" class="btn btn-sm btn-outline-danger btn-delete"
                                        data-id="{{ $v->id }}">
                                        <i class="bi bi-trash me-1"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- TAMBAH TAMBAH --}}
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data" id="form-submit-information">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahLabel">Tambah Informasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="information_categories" class="form-label">Kategori Informasi</label>
                                <div class="input-group">
                                    <select id="information_categories" name="category" class="form-select">
                                        <option selected>Pilih Kategori Informasi</option>
                                        @foreach ($information_categories as $information_category)
                                            <option value="{{ $information_category->id }}">
                                                {{ $information_category->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="bt-secondary d-flex align-items-center" type="button"
                                        data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                                        <span class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Tahun</label>
                                <select id="year" name="year" class="form-select">
                                    <option selected>Pilih Tahun</option>
                                    @for ($i = date('Y'); $i >= 2018; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <label class="form-label fw-bold">Konten / Isi</label>
                            <div class="border rounded p-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tr-konten" id="tr-link"
                                        value="tr-link" checked onclick="switchtambahKonten()">
                                    <label class="form-check-label" for="tr-link">Link</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tr-konten" id="tr-file"
                                        value="tr-file" onclick="switchtambahKonten()">
                                    <label class="form-check-label" for="tr-file">File</label>
                                </div>

                                <div class="mt-3" id="div-tambahlink">
                                    <label for="link-info" class="form-label">Link</label>
                                    <input type="text" id="link-info" name="link" class="form-control"
                                        placeholder="Masukkan Link" required>
                                </div>

                                <div class="mt-3 d-none" id="div-tambahfile">
                                    <label for="upload-file" class="form-label">Upload File</label>
                                    <input type="file" class="form-control" id="upload-file" name="file"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="bt-primary">Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategoriLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKategoriLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="information_category_name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="information_category_name"
                                name="information_category_name" placeholder="Nama Kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-add-category" class="bt-primary">
                            <i class="bi bi-save me-2"></i>Simpan Kategori
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.information.patch') }}"
                        id="form-patch">
                        @csrf
                        <input type="hidden" name="id" id="id-edit">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel">Edit Informasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="information_categories_edit" class="form-label">Kategori Informasi</label>
                                <select id="information_categories_edit" name="category_edit" class="form-select">
                                    <option selected>Pilih Kategori Informasi</option>
                                    @foreach ($information_categories as $information_category)
                                        <option value="{{ $information_category->id }}">{{ $information_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="year_edit" class="form-label">Tahun</label>
                                <select id="year_edit" name="year_edit" class="form-select">
                                    <option selected>Pilih Tahun</option>
                                    @for ($i = date('Y'); $i >= 2018; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <label class="form-label fw-bold">Konten / Isi</label>
                            <div class="border rounded p-3 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="er-konten" id="er-link"
                                        value="er-link" checked onclick="switcheditKonten()">
                                    <label class="form-check-label" for="er-link">Link</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="er-konten" id="er-file"
                                        value="er-file" onclick="switcheditKonten()">
                                    <label class="form-check-label" for="er-file">File</label>
                                </div>

                                <div class="mt-3" id="div-editlink">
                                    <label for="e-link-info" class="form-label">Link</label>
                                    <input type="text" class="form-control" id="e-link-info" name="e-link-edit"
                                        placeholder="Masukkan Link" required>
                                </div>

                                <div class="mt-3 d-none" id="div-editfile">
                                    <label for="upload-file" class="form-label">Upload File</label>
                                    <input class="form-control" type="file" id="upload-file" name="file-edit"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn-patch" class="bt-primary">
                                Simpan Informasi
                            </button>
                        </div>
                    </form>
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
        const editm = document.getElementById('modalEdit');
        const tambahm = document.getElementById('modalTambah');
        const kategorim = document.getElementById('modalTambahKategori');
        // options with default values
        const options = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900 bg-opacity-50 fixed inset-0 z-40',
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            }
        };

        function switchtambahKonten() {
            const isLink = document.querySelector('input[name="tr-konten"]:checked')?.value === "tr-link";
            const linkInput = document.getElementById('link-info');
            const fileInput = document.getElementById('upload-file');

            const divLink = document.getElementById('div-tambahlink');
            const divFile = document.getElementById('div-tambahfile');

            // Tampilkan / sembunyikan
            divLink.classList.toggle("d-none", !isLink);
            divFile.classList.toggle("d-none", isLink);

            // Aktifkan / nonaktifkan input agar tidak divalidasi oleh browser
            linkInput.disabled = !isLink;
            fileInput.disabled = isLink;
        }

        function switcheditKonten() {
            const isLink = document.querySelector('input[name="er-konten"]:checked')?.value === "er-link";
            const linkInput = document.getElementById('e-link-info');
            const fileInput = document.getElementById('upload-file');

            const divLink = document.getElementById('div-editlink');
            const divFile = document.getElementById('div-editfile');

            divLink.classList.toggle("d-none", !isLink);
            divFile.classList.toggle("d-none", isLink);

            linkInput.disabled = !isLink;
            fileInput.disabled = isLink;
        }

        function generateDataTable() {
            table = $('#table-data').DataTable();

        }

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        async function addInformationCategory() {
            try {
                let url = '{{ route('admin.information.category.add', ['id' => $category->id]) }}';
                let information_category_name = $('#information_category_name').val();
                let response = await $.post(url, {
                    information_category_name
                });
                let payload = response['payload'];
                generateCategoryOption(payload);
                clearAddInformationCategory();
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text: 'Berhasil menambahkan data kategori informasi...',
                }).then(function(result) {
                    if (result) {
                        closeModalKategori();
                    }
                });
            } catch (e) {
                let error_message = JSON.parse(e.responseText);
                Swal.fire({
                    icon: "error",
                    text: error_message.message,
                });
            }
        }

        function generateCategoryOption(data) {
            let el = $("#information_categories");
            el.empty();
            el.append('<option value="" selected>Pilih Kategori Informasi</option>');
            $.each(data, function(k, v) {
                el.append('<option value="' + v['id'] + '">' + v['name'] + '</option>')
            })
        }

        function clearAddInformationCategory() {
            $('#information_category_name').val('');
        }

        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.information-detail.delete') }}", // sesuaikan route
                        type: 'POST',

                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus!',
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Optional: hilangkan row-nya dari tabel
                            $(`button[data-id="${id}"]`).closest('tr').fadeOut();
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: xhr.responseJSON?.message ||
                                    'Terjadi kesalahan saat menghapus data.'
                            });
                        }
                    });
                }
            });
        });


        $(document).ready(function() {
            generateDataTable();
            $('#btn-add-category').on('click', function(e) {
                alert('test');
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    icon: 'info',
                    text: 'Yakin ingin menambah data kategori?',
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        addInformationCategory();
                    }
                })
            })

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

            $(document).on('click', '.btn-edit', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const category = $(this).data('category');
                const year = $(this).data('year');
                const type = $(this).data('type');
                const link = $(this).data('link');

                $('#id-edit').val(id);
                $('#information_categories_edit').val(category);
                $('#year_edit').val(year);

                if (type === 0 || type === '0') {
                    $('#e-link-info').val(link);
                    $('#er-file').prop('checked', false);
                    $('#er-link').prop('checked', true);
                    switcheditKonten();
                } else {
                    $('#er-link').prop('checked', false);
                    $('#er-file').prop('checked', true);
                    switcheditKonten();
                }

                const modalEdit = new bootstrap.Modal(document.getElementById('modalEdit'));
                modalEdit.show();
            });

        });

        function checkSize(a) {

            // if ($(a)[0].files && $(a)[0].files[0].size > 2097152){
            //     Swal.fire({
            //         icon: "error",
            //         text: "Ukuran file tidak boleh lebih dari 2Mb"
            //     })
            //     $('.upload-file').val('');
            // }
        }
    </script>
@endsection
