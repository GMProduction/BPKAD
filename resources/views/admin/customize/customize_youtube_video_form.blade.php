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
            <div class="panel-heading">
                <h4 class="panel-title">Form Video Youtube</h4>
            </div>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="iframe" class="form-label">Link Video Youtube</label>
                    <textarea type="text" id="iframe" rows="4" required class="form-control" placeholder="Ifram youtube"
                        name="iframe">{{ old('iframe', $data ? $data->url : '') }}</textarea>
                    @if ($errors->has('iframe'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('iframe') }}
                        </span>
                    @endif
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <button type="submit" class="bt-primary  ml-auto">
                        <span class="material-symbols-outlined">save</span> Simpan
                    </button>
                </div>

                {{-- {!! $data ? $data->url : '' !!} --}}


            </form>
        </div>
    </div>
@endsection

@section('morejs')
    <script></script>
@endsection
