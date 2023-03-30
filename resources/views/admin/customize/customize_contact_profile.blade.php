@extends('admin.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
@endsection

@section('content')
    <div class="panel h-full">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900  ">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{route('customize.contact.profile')}}"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Customize
                            Kontak Profil</a>
                    </div>
                </li>

            </ol>
        </nav>
        @if (\Illuminate\Support\Facades\Session::has('failed'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                 role="alert">
                <span class="font-medium">Gagal!</span>
                {{ \Illuminate\Support\Facades\Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                 role="alert">
                <span class="font-medium">Berhasil!</span> {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif
        <p class="title">Tampilan Kontak Profil</p>

        <div class="p-5 border bg-white shadow-md">
            <form method="post">
                @csrf

                {{-- <div x-data="showImage()" class="w-full">
                    <div class="mb-6">
                        <div>
                            <label class="inline-block mb-2 text-gray-500">Gambar Header</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col w-full border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                    <div class="relative flex flex-col items-center justify-center pt-7">
                                        <img id="preview" class="absolute inset-0 h-[141px] object-fit"
                                             src="{{ $data !== null ? asset($data->image) : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                                             viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                            pilih foto</p>
                                    </div>
                                    <input type="file" class="opacity-0" accept="image/*" @change="showPreview(event)"
                                           name="image"/>
                                </label>
                            </div>
                        </div>

                    </div>
                </div> --}}
                <div class="flex flex-col md:flex-row justify-between md:gap-4">
                    <div class="mb-6 w-full">
                        <label for="sejarah-text" class="block mb-2 text-sm font-medium text-gray-600 ">Email</label>
                        <input type="text" id="aspirasi-nama" name="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5" value="{{old('email',$data ? $data->email : '')}}"
                               placeholder="Email" required>
                    </div>
                    <div class="mb-6 w-full">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-600 ">Telp</label>
                        <input type="text" id="aspirasi-nama" name="phone"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " value="{{old('phone',$data ? $data->phone : '')}}"
                               placeholder="Nomor Telepon" required>
                    </div>

                </div>
                <div class="mb-6">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-600 ">Alamat</label>
                    <textarea type="text" id="address" rows="4" required
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Alamat"
                              name="address">{{old('address',$data ? $data->address : '')}}</textarea>
                </div>
                <div class="mb-6">
                    <label for="office_hours" class="block mb-2 text-sm font-medium text-gray-600 ">Jam Kerja</label>
                    <textarea type="text" id="office_hours" rows="4" required
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Jam Kerja"
                              name="office_hours">{{old('office_hours',$data ? $data->office_hours : '')}}</textarea>
                </div>
                <div class="mb-6 w-full">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-600 ">Lokasi GPS</label>
                    <textarea type="text" id="location" rows="4" required
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Lokasi Gps"
                              name="location">{{old('location',$data ? $data->location : '')}}</textarea>
                </div>
                <div class="mb-6 md:w-[50%]">
                    <label for="instagram" class="block mb-2 text-sm font-medium text-gray-600 ">Instagram</label>
                    <input type="text" id="aspirasi-nama" name="instagram" value="{{old('instagram', $data ? $data->instagram : '')}}"
                           class="bg-gray-50 border {{$errors->has('instagram') ? 'border-red-500':'border-gray-300'}} text-gray-900 text-sm  block w-full p-2.5 "
                           placeholder="https://www.instagram.com/akun_instagram"/>
                    @if($errors->has('instagram'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{$errors->first('instagram')}}
                        </span>
                    @endif
                </div>
                <div class="mb-6 md:w-[50%]">
                    <label for="Twitter" class="block mb-2 text-sm font-medium text-gray-600 ">Twitter</label>
                    <input type="text" id="aspirasi-nama" name="twitter" value="{{old('twitter', $data ? $data->twitter : '')}}"
                           class="bg-gray-50 border {{$errors->has('twitter') ? 'border-red-500':'border-gray-300'}} text-gray-900 text-sm  block w-full p-2.5 "
                           placeholder="https://twitter.com/akun_twitter"/>
                    @if($errors->has('twitter'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{$errors->first('twitter')}}
                        </span>
                    @endif

                </div>
                <div class="mb-6 md:w-[50%]">
                    <label for="Twitter" class="block mb-2 text-sm font-medium text-gray-600 ">Facebook</label>
                    <input type="text" id="aspirasi-nama" name="facebook" value="{{old('facebook', $data ? $data->facebook : '')}}"
                           class="bg-gray-50 border {{$errors->has('facebook') ? 'border-red-500':'border-gray-300'}} text-gray-900 text-sm  block w-full p-2.5 " v
                           placeholder="https://www.facebook.com/akun_facebook">
                    @if($errors->has('facebook'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{$errors->first('facebook')}}
                        </span>
                    @endif

                </div>
                <div class="mb-6 md:w-[50%]">
                    <label for="Twitter" class="block mb-2 text-sm font-medium text-gray-600 ">Youtube</label>
                    <input type="text" id="aspirasi-nama" name="youtube" value="{{old('youtube', $data ? $data->youtube : '')}}"
                           class="bg-gray-50 border {{$errors->has('youtube') ? 'border-red-500':'border-gray-300'}} text-gray-900 text-sm  block w-full p-2.5 "
                           placeholder="https://www.youtube.com/@akun_youtube">
                    @if($errors->has('youtube'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{$errors->first('youtube')}}
                        </span>
                    @endif
                </div>
               {{-- <div class="mb-6 md:w-[50%]">
                    <label for="Twitter" class="block mb-2 text-sm font-medium text-gray-600 ">Tiktok</label>
                    <input type="text" id="aspirasi-nama" name="tiktok" value="{{old('tiktok', $data ? $data->tiktok : '')}}"
                           class="bg-gray-50 border {{$errors->has('tiktok') ? 'border-red-500':'border-gray-300'}} text-gray-900 text-sm  block w-full p-2.5 "
                           placeholder="https://tiktok.com/@akun_tiktok">
                    @if($errors->has('tiktok'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{$errors->first('tiktok')}}
                        </span>
                    @endif
                </div>--}}
                <button type="submit"
                        class="flex ml-auto items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                    <span class="material-symbols-outlined text-white mr-3">
                        save
                    </span>Simpan
                </button>
            </form>
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
