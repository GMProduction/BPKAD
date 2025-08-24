@extends('admin.customize.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
@endsection

@section('content-customize')
    <div class="panel-container">


        @if (\Illuminate\Support\Facades\Session::has('failed'))
            <div class="p-4 mb-4 text-md text-red-700 bg-red-100 rounded-lg  " role="alert">
                <span class="font-medium">Gagal!</span>
                {{ \Illuminate\Support\Facades\Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="p-4 mb-4 text-md text-green-700 bg-green-100 rounded-lg " role="alert">
                <span class="font-medium">Berhasil!</span> {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif


        <div class="panel">

            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Sejarah BPKAD</h4>
                </div>
            </div>
            <p class="help-block">
                Ketikan sejarah singkat tentang BPKAD Surakarta
            </p>
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <textarea name="history" id="sejarah-text" rows="6" class="form-control" placeholder="Tuliskan sejarah BPKAD...">{{ $data !== null ? $data->history : '' }}</textarea>

                    <div class="alert alert-info small mt-3">
                        <strong>Catatan:</strong> Teks sejarah akan ditampilkan pada bagian footer.
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="bt-primary  ml-auto">
                            <span class="material-symbols-outlined">save</span> Simpan
                        </button>
                    </div>
                </div>



            </form>


        </div>
    </div>
@endsection

@section('morejs')
@endsection
