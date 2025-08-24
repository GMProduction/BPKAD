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
                {{ Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success" role="alert">
                <span class="font-medium">Berhasil!</span> {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="title">Tampilan Kontak Profil</p>


        <div class="panel-container">
            <div class="panel panel-default">
                <div class="panel-body p-4">

                    <form method="POST" action="{{ route('customize.contact.profile.patch') }}" class="custom-form">
                        @csrf

                        {{-- ===== Baris Email & Telepon ===== --}}
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Email" value="{{ old('email', $data?->email) }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Telp</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Nomor Telepon" value="{{ old('phone', $data?->phone) }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- ===== Alamat ===== --}}
                        <div class="form-group mt-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea id="address" name="address" rows="4" class="form-control" placeholder="Alamat" required>{{ old('address', $data?->address) }}</textarea>
                        </div>

                        {{-- ===== Jam Kerja ===== --}}
                        <div class="form-group mt-3">
                            <label for="office_hours" class="form-label">Jam Kerja</label>
                            <textarea id="office_hours" name="office_hours" rows="3" class="form-control" placeholder="Jam Kerja" required>{{ old('office_hours', $data?->office_hours) }}</textarea>
                        </div>

                        {{-- ===== Lokasi GPS ===== --}}
                        <div class="form-group mt-3">
                            <label for="location" class="form-label">Lokasi GPS</label>
                            <textarea id="location" name="location" rows="3" class="form-control" placeholder="Lokasi GPS" required>{{ old('location', $data?->location) }}</textarea>
                        </div>

                        {{-- ===== Sosial Media (empat kolom, 2–per‑baris) ===== --}}
                        <div class="row g-3 mt-1" style="display: none">
                            @php
                                $socials = [
                                    'instagram' => 'Instagram',
                                    'twitter' => 'Twitter',
                                    'facebook' => 'Facebook',
                                    'youtube' => 'YouTube',
                                ];
                            @endphp

                            @foreach ($socials as $field => $label)
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                        <input type="text" id="{{ $field }}" name="{{ $field }}"
                                            class="form-control {{ $errors->has($field) ? 'is-invalid' : '' }}"
                                            placeholder="https://{{ $field }}.com/akun"
                                            value="{{ old($field, $data?->$field) }}">
                                        @error($field)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- ===== Tombol Simpan ===== --}}
                        <div class="text-end mt-4">
                            <button type="submit" class="bt-primary">
                                <span class="material-symbols-outlined me-2">save</span>Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('morejs')
    <script>
        // function showImage() {
        //     return {
        //         showPreview(event) {
        //             if (event.target.files.length > 0) {
        //                 var src = URL.createObjectURL(event.target.files[0]);
        //                 var preview = document.getElementById("preview");
        //                 preview.src = src;
        //                 preview.style.display = "block";
        //             }
        //         }
        //     }
        // }
    </script>
@endsection
