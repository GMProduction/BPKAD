@extends('admin.customize.base')

@section('head')
@endsection

@section('css')
    <link href="{{ asset('js/admin/summernote-bs5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin/summernote-bs5.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Profil BPKAD</h4>
                </div>
            </div>
            <p class="help-block">
                masukan sesuai dengan profil BPKAD
            </p>
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

                <div class="alert alert-info small mt-3">
                    <strong>Catatan:</strong> Data profil ini akan ditampilkan pada halaman profil BPKAD.
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="bt-primary ">
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

        $(document).ready(function() {
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
        });
    </script>
@endsection
