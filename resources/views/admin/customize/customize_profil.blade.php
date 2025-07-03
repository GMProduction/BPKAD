@extends('admin.customize.base')

@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
@endsection

@section('content-customize')
    <div class="panel-container">

        @if (Session::has('failed'))
            <div class="alert alert-danger">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
            </div>
        @endif

        <div class="panel">
            <div class="alert alert-info small">
                <strong>Catatan:</strong> Data profil ini akan ditampilkan pada halaman profil BPKAD.
            </div>
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Profil BPKAD</h4>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form-input">
                @csrf

                <div class="form-group mt-3">
                    <label for="visi-text">Visi</label>
                    <textarea name="vision" id="visi-text" rows="4" class="form-control" placeholder="Tuliskan visi...">{{ $data !== null ? $data->vision : '' }}</textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="misi-text">Misi</label>
                    <textarea name="mission" id="misi-text" rows="4" class="form-control" placeholder="Tuliskan misi...">{{ $data !== null ? $data->mission : '' }}</textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="motto-text">Motto</label>
                    <textarea name="motto" id="motto-text" rows="2" class="form-control" placeholder="Tuliskan motto...">{{ $data !== null ? $data->motto : '' }}</textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="skpengelolaweb">Link Pengelola Website</label>
                    <input type="text" id="skpengelolaweb" name="url" value="{{ $data !== null ? $data->url : '' }}"
                        class="form-control" placeholder="https://...">
                </div>

                <div class="form-group mt-3">
                    <label>Struktur Organisasi</label>
                    <div class="struktur-preview mb-3">
                        @if ($data !== null && $data->structure)
                            <img src="{{ asset($data->structure) }}" id="preview" class="img-thumbnail"
                                style="max-height: 200px;">
                        @endif
                    </div>
                    <input type="file" name="structure" class="form-control" accept="image/*">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="bt-primary mt-3">
                        <span class="material-symbols-outlined">save</span> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('morejs')
    <script>
        function check() {
            let text = $('#visi-text').summernote('code');
            console.log(text);
        }

        $('#motto-text').summernote({
            placeholder: 'Motto BPKAD',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#visi-text').summernote({
            placeholder: 'Visi BPKAD',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('#misi-text').summernote({
            placeholder: 'Misi BPKAD',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

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

        $(document).ready(function() {});
    </script>
@endsection
