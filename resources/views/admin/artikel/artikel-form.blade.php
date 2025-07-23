@extends('admin.base')

@section('head')
@endsection

@section('css')
    <style>
        .note-editable {
            background-color: white !important;
        }
    </style>

    <link href="{{ asset('js/admin/summernote-bs5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin/summernote-bs5.min.js') }}"></script>
@endsection

@section('content')
    <div class="panel-container pb-0">
        <div class="card shadow-sm">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.article') }}">Artikel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
                </ol>
            </nav>
        </div>
        <!-- Konten lainnya -->
    </div>

    <div class="panel-container p-4">

        <div class="panel bg-white">
            @if (\Illuminate\Support\Facades\Session::has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ \Illuminate\Support\Facades\Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ \Illuminate\Support\Facades\Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <p class="title mb-10">Artikel BPKAD</p>

            <form id="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" id="aspirasi-nama" name="date" class="form-control"
                        value="{{ old('date', $data ? $data->date : '') }}" placeholder="Tanggal" required>
                </div>

                <div class="mb-3">
                    <label for="aspirasi-nama" class="form-label">Judul</label>
                    <input type="text" id="aspirasi-nama" name="title" class="form-control"
                        value="{{ old('title', $data ? $data->title : '') }}" placeholder="Judul Artikel" required>
                </div>

                <div x-data="showImage()" class="mb-4">
                    <label class="form-label">Cover Artikel</label>
                    <div class="mb-2">
                        <div class="border border-dashed rounded p-4 text-center position-relative">
                            <img id="preview" class="position-absolute top-0 start-50 translate-middle-x"
                                style="height: 141px; object-fit: contain;"
                                src="{{ $data ? ($data->cover ? asset($data->cover) : '') : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 text-secondary" width="40"
                                height="40" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-muted small">Pilih Foto</p>
                            <input type="file" class="form-control mt-2" accept="image/*" @change="showPreview(event)"
                                name="cover">
                        </div>
                    </div>
                    @if ($errors->has('cover'))
                        <div class="text-danger small mt-1">
                            {{ $errors->first('cover') }}
                        </div>
                    @endif
                </div>

                <label class="form-label">Konten</label>

                <div class="border rounded p-3 mb-4">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_highline" name="is_highline" value="1"
                            {{ $data ? ($data->is_highline ? 'checked' : '') : '' }}>
                        <label class="form-check-label" for="is_highline">
                            Tampilkan Sebagai Headline
                        </label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-lg-3 mb-3">
                            <input type="radio" class="btn-check" name="tr-konten" id="tr-link" value="tr-link"
                                autocomplete="off" {{ $data ? ($data->type_article == 1 ? 'checked' : '') : '' }} checked
                                onclick="switchtambahKonten()">
                            <label class="btn btn-outline-secondary w-100" for="tr-link">
                                <strong>Link</strong><br><small>Konten Menggunakan Link</small>
                            </label>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <input type="radio" class="btn-check" name="tr-konten" id="tr-file" value="tr-file"
                                autocomplete="off" {{ $data ? ($data->type_article == 2 ? 'checked' : '') : '' }}
                                onclick="switchtambahKonten()">
                            <label class="btn btn-outline-secondary w-100" for="tr-file">
                                <strong>Ketik Artikel</strong><br><small>Membuat artikel sendiri</small>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" id="type_article" name="type_article" value="1">

                    <div class="mb-3" id="div-tambahlink">
                        <label for="link-info" class="form-label">Link</label>
                        <input type="text" id="link-info" name="link" class="form-control" required
                            value="{{ $data ? ($data->type_article == 1 ? $data->description : '') : '' }}"
                            placeholder="Masukan Link Url">
                    </div>

                    <div class="mb-3 d-none" id="div-tambahfile">
                        <label for="isiartikel" class="form-label">Ketik Artikel</label>
                        <textarea class="form-control summernote" id="isiartikel" name="description">{{ $data ? ($data->type_article == 2 ? $data->description : '') : '' }}</textarea>
                        <div id="errorArticle" class="text-danger small mt-1 d-none">Silahkan mengisi artikel</div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class=" bt-primary d-flex align-items-center">
                        <span class="material-symbols-outlined me-2">cast</span>
                        Terbitkan
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('morejs')
    <script>
        $(document).ready(function() {
            switchtambahKonten();

            $('#isiartikel').summernote({
                placeholder: '',
                tabsize: 2,
                height: 120,
                maximumImageFileSize: 1048576,
                // toolbar: [
                //     ['style', ['style']],
                //     ['font', ['bold', 'underline', 'clear']],
                //     ['color', ['color']],
                //     ['para', ['ul', 'ol', 'paragraph']],
                //     ['table', ['table']],
                //     ['insert', ['link', 'picture', 'video']],
                //     ['view', ['fullscreen', 'codeview', 'help']]
                // ],
            });



        })

        function switchtambahKonten() {
            const isLink = document.querySelector('input[name="tr-konten"]:checked').value === "tr-link";

            const fileDiv = document.querySelector('#div-tambahfile');
            const linkDiv = document.querySelector('#div-tambahlink');
            const linkInput = document.querySelector('#link-info');
            const typeInput = document.getElementById('type_article');

            if (isLink) {
                fileDiv.classList.add("d-none");
                linkDiv.classList.remove("d-none");
                linkInput.setAttribute('required', '');
                typeInput.value = '1';
            } else {
                fileDiv.classList.remove("d-none");
                linkDiv.classList.add("d-none");
                linkInput.removeAttribute('required');
                typeInput.value = '2';
            }
        }


        function showImage() {
            return {
                showPreview(event) {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        var preview = document.getElementById("preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            }
        }

        function SaveDataForm() {
            let text = $('#isiartikel').summernote('code');
            let type = document.getElementById('type_article').value;

            if (!text || text.trim() === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Konten kosong',
                    text: 'Silakan isi konten artikel terlebih dahulu.',
                });
                return;
            }

            Swal.fire({
                title: 'Simpan Data?',
                text: "Pastikan data sudah sesuai.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan submit via AJAX (jika perlu), atau submit form biasa
                    // Misalnya pakai jQuery ajax:
                    $.ajax({
                        url: '/artikel/simpan', // ganti dengan URL yang sesuai
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            content: text,
                            type_article: type
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data berhasil disimpan.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                // reload atau redirect kalau perlu
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal menyimpan!',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
