@extends('admin.customize.base')

@section('head')
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
                <strong>Catatan:</strong> Teks sejarah akan ditampilkan pada bagian footer.
            </div>
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Sejarah BPKAD</h4>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <textarea name="history" id="sejarah-text" rows="6" class="form-control" placeholder="Tuliskan sejarah BPKAD...">{{ $data !== null ? $data->history : '' }}</textarea>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="bt-primary mt-3 ml-auto">
                            <span class="material-symbols-outlined">save</span> Simpan
                        </button>
                    </div>
                </div>



            </form>


        </div>
    </div>
@endsection

@section('morejs')
    <script></script>
@endsection
