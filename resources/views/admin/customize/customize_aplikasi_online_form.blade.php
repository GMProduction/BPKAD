@extends('admin.customize.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
@endsection

@section('content-customize')
    <div class="panel-container">

        @if (\Illuminate\Support\Facades\Session::has('failed'))
            <div class="alert alert-danger" role="alert">
                <span class="font-medium">Gagal!</span>
                {{ \Illuminate\Support\Facades\Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success" role="alert">
                <span class="font-medium">Berhasil!</span> {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif
        <p class="title">Form Aplikasi Online</p>

        <div class="panel-form">
            <form method="post" enctype="multipart/form-data" class="app-form">
                @csrf

                {{-- Upload & preview gambar --}}
                <div x-data="showImage()" class="form-group">
                    <label class="form-label">Gambar Aplikasi</label>

                    <label class="image-upload">
                        <div class="image-upload__inner">
                            <img id="preview" src="{{ $data ? asset($data->image) : '' }}" alt="Preview icon aplikasi" />

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="image-upload__icon">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2
                                                 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                            </svg>

                            <p class="image-upload__text">Pilih foto</p>
                        </div>
                        <input type="file" name="icon" accept="image/*" @change="showPreview(event)"
                            class="image-upload__input" />
                    </label>

                    @error('icon')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nama aplikasi --}}
                <div class="form-group">
                    <label for="app-name" class="form-label">Nama Aplikasi</label>
                    <input id="app-name" name="name" type="text" value="{{ old('name', $data->name ?? '') }}"
                        class="form-control" placeholder="Nama aplikasi" required>
                </div>

                {{-- URL aplikasi --}}
                <div class="form-group">
                    <label for="app-url" class="form-label">URL Aplikasi</label>
                    <input id="app-url" name="url" type="url" value="{{ old('url', $data->url ?? '') }}"
                        class="form-control" placeholder="https://contoh.com" required>
                </div>

                {{-- Deskripsi pendek --}}
                <div class="form-group">
                    <label for="short-desc" class="form-label">Deskripsi Pendek</label>
                    <input id="short-desc" name="short_description" type="text"
                        value="{{ old('short_description', $data->short_description ?? '') }}" class="form-control"
                        placeholder="Deskripsi singkat" required>
                </div>

                {{-- Deskripsi panjang --}}
                <div class="form-group">
                    <label for="long-desc" class="form-label">Deskripsi Panjang</label>
                    <textarea id="long-desc" name="description" rows="5" class="form-control" placeholder="Deskripsi lengkap"
                        required>{{ old('description', $data->description ?? '') }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="bt-primary">
                        <span class="material-symbols-outlined me-2">save</span> Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('morejs')
    <script>
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
    </script>
@endsection
