@extends('admin.base')

@section('head')
@endsection

@section('css')
    <style>
        .note-editable {
            background-color: white !important;
        }
        .field-error {
            display: none;
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 4px;
        }
        .field-error.show {
            display: block;
        }
        .is-invalid-custom {
            border-color: #dc3545 !important;
        }
        .note-editor.is-invalid-custom {
            border: 1px solid #dc3545 !important;
            border-radius: 4px;
        }
        .cover-area.is-invalid-custom {
            border-color: #dc3545 !important;
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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $data ? 'Ubah Artikel' : 'Tambah Artikel' }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="panel-container p-4">

        <div class="panel bg-white">
            @if (Session::has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terdapat kesalahan pada form:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <p class="title mb-10">{{ $data ? 'Ubah Artikel' : 'Tambah Artikel' }} BPKAD</p>

            <form id="form" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label for="input-date" class="form-label">
                        Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="input-date" name="date"
                        class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date', $data ? $data->date : '') }}"
                        placeholder="Tanggal">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="field-error" id="err-date">Tanggal artikel harus diisi.</div>
                    @enderror
                </div>

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="input-title" class="form-label">
                        Judul <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="input-title" name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $data ? $data->title : '') }}"
                        placeholder="Judul Artikel" maxlength="255">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @else
                        <div class="field-error" id="err-title">Judul artikel harus diisi.</div>
                    @enderror
                </div>

                {{-- Cover --}}
                <div x-data="showImage()" class="mb-4">
                    <label class="form-label">Cover Artikel
                        <small class="text-muted">(Opsional, maks. 2MB)</small>
                    </label>
                    <div class="mb-2">
                        <div class="border border-dashed rounded p-4 text-center position-relative" id="cover-area">
                            <img id="preview" class="position-absolute top-0 start-50 translate-middle-x"
                                style="height: 141px; object-fit: contain;"
                                src="{{ $data ? ($data->cover ? asset($data->cover) : '') : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 text-secondary" width="40"
                                height="40" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-muted small">Pilih Foto (JPG, PNG, GIF — maks. 2MB)</p>
                            <input type="file" id="input-cover" class="form-control mt-2 @error('cover') is-invalid @enderror"
                                accept="image/*" @change="showPreview(event)" name="cover">
                        </div>
                    </div>
                    @error('cover')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @else
                        <div class="field-error" id="err-cover"></div>
                    @enderror
                </div>

                {{-- Konten --}}
                <label class="form-label">Konten <span class="text-danger">*</span></label>

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

                    <input type="hidden" id="type_article" name="type_article" value="{{ old('type_article', $data ? $data->type_article : 1) }}">

                    {{-- Input Link --}}
                    <div class="mb-3" id="div-tambahlink">
                        <label for="link-info" class="form-label">URL Link <span class="text-danger">*</span></label>
                        <input type="url" id="link-info" name="link" class="form-control @error('link') is-invalid @enderror"
                            value="{{ old('link', $data ? ($data->type_article == 1 ? $data->description : '') : '') }}"
                            placeholder="https://contoh.com/artikel">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="field-error" id="err-link">Link URL harus diisi dan berformat URL yang valid (contoh: https://...).</div>
                        @enderror
                    </div>

                    {{-- Input Artikel (WYSIWYG) --}}
                    <div class="mb-3 d-none" id="div-tambahfile">
                        <label for="isiartikel" class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote" id="isiartikel" name="description">{{ old('description', $data ? ($data->type_article == 2 ? $data->description : '') : '') }}</textarea>
                        <div class="field-error" id="err-description">Isi artikel tidak boleh kosong.</div>
                    </div>
                </div>

                <div class="text-end d-flex align-items-center justify-content-end gap-2">
                    <a href="{{ route('admin.article') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" id="btn-submit" class="bt-primary d-flex align-items-center">
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
                placeholder: 'Tuliskan isi artikel di sini...',
                tabsize: 2,
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            uploadImageToServer(files[i], this);
                        }
                    },
                    onChange: function() {
                        // Hapus error saat user mulai mengetik
                        clearError('err-description');
                        $('#isiartikel').closest('.note-editor').removeClass('is-invalid-custom');
                    }
                }
            });

            function uploadImageToServer(file, editor) {
                // Validasi ukuran file sebelum upload
                if (file.size > 5 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'File Terlalu Besar',
                        text: 'Ukuran gambar tidak boleh lebih dari 5MB.',
                    });
                    return;
                }

                let formData = new FormData();
                formData.append('file', file);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route("admin.article.upload.image") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.url) {
                            $(editor).summernote('insertImage', response.url);
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal upload', text: response.error || 'Terjadi kesalahan.' });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({ icon: 'error', title: 'Gagal upload', text: 'Pastikan ukuran file tidak melebihi 5MB.' });
                    }
                });
            }

            // Validasi form sebelum submit
            $('#form').on('submit', function(e) {
                let valid = true;

                // Reset semua error
                $('.field-error').removeClass('show');
                $('.form-control').removeClass('is-invalid-custom');
                $('#isiartikel').closest('.note-editor').removeClass('is-invalid-custom');

                // Validasi tanggal
                const date = $('#input-date').val().trim();
                if (!date) {
                    showError('err-date');
                    $('#input-date').addClass('is-invalid-custom');
                    valid = false;
                }

                // Validasi judul
                const title = $('#input-title').val().trim();
                if (!title) {
                    showError('err-title');
                    $('#input-title').addClass('is-invalid-custom');
                    valid = false;
                }

                // Validasi cover (ukuran file)
                const coverFile = $('#input-cover')[0].files[0];
                if (coverFile && coverFile.size > 2 * 1024 * 1024) {
                    document.getElementById('err-cover').textContent = 'Ukuran cover tidak boleh lebih dari 2MB.';
                    showError('err-cover');
                    valid = false;
                }

                const type = $('#type_article').val();

                if (type == '1') {
                    // Validasi link
                    const link = $('#link-info').val().trim();
                    if (!link) {
                        showError('err-link');
                        $('#link-info').addClass('is-invalid-custom');
                        valid = false;
                    }
                } else {
                    // Validasi isi artikel (Summernote)
                    const content = $('#isiartikel').summernote('code');
                    const stripped = content.replace(/<[^>]*>/g, '').trim();
                    if (!stripped) {
                        showError('err-description');
                        $('#isiartikel').closest('.note-editor').addClass('is-invalid-custom');
                        valid = false;
                    }
                }

                if (!valid) {
                    e.preventDefault();
                    // Scroll ke error pertama
                    const firstError = document.querySelector('.field-error.show, .is-invalid, .is-invalid-custom');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return false;
                }
            });

            // Hapus error saat user mengisi field
            $('#input-date').on('change', function() {
                clearError('err-date');
                $(this).removeClass('is-invalid-custom');
            });
            $('#input-title').on('input', function() {
                clearError('err-title');
                $(this).removeClass('is-invalid-custom');
            });
            $('#link-info').on('input', function() {
                clearError('err-link');
                $(this).removeClass('is-invalid-custom');
            });
            $('#input-cover').on('change', function() {
                clearError('err-cover');
            });
        });

        function showError(id) {
            const el = document.getElementById(id);
            if (el) el.classList.add('show');
        }

        function clearError(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove('show');
        }

        function switchtambahKonten() {
            const isLink = document.querySelector('input[name="tr-konten"]:checked').value === "tr-link";

            const fileDiv = document.querySelector('#div-tambahfile');
            const linkDiv = document.querySelector('#div-tambahlink');
            const linkInput = document.querySelector('#link-info');
            const typeInput = document.getElementById('type_article');

            // Reset error konten saat switch
            clearError('err-link');
            clearError('err-description');
            if (linkInput) linkInput.classList.remove('is-invalid-custom');
            const noteEditor = document.querySelector('#isiartikel')?.closest?.('.note-editor');
            if (noteEditor) noteEditor.classList.remove('is-invalid-custom');

            if (isLink) {
                fileDiv.classList.add("d-none");
                linkDiv.classList.remove("d-none");
                typeInput.value = '1';
            } else {
                fileDiv.classList.remove("d-none");
                linkDiv.classList.add("d-none");
                typeInput.value = '2';
            }
        }

        function showImage() {
            return {
                showPreview(event) {
                    if (event.target.files.length > 0) {
                        const file = event.target.files[0];
                        if (file.size > 2 * 1024 * 1024) {
                            document.getElementById('err-cover').textContent = 'Ukuran cover tidak boleh lebih dari 2MB.';
                            document.getElementById('err-cover').classList.add('show');
                            event.target.value = '';
                            document.getElementById('preview').src = '';
                            return;
                        }
                        var src = URL.createObjectURL(file);
                        var preview = document.getElementById("preview");
                        preview.src = src;
                        preview.style.display = "block";
                        clearError('err-cover');
                    }
                }
            }
        }
    </script>
@endsection


