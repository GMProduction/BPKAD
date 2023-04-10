@extends('admin.base')

@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
    <style>
        .note-editable {
            background-color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="panel min-h-screen">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin"
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
                        <a href="/admin/artikel"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Artikel</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="/admin/aspirasi/detail"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Tambah Artikel</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="panel bg-white">
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
            <p class="title mb-10">Artikel BPKAD</p>

            <form id="form" method="POST" enctype="multipart/form-data">
                <div class="mb-6 ">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-600 ">Tanggal</label>
                    <input type="date" id="aspirasi-nama" name="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block  p-2.5 "
                        value="{{ old('date', $data ? $data->date : '') }}" placeholder="Tanggal" required>
                </div>
                @csrf
                <div class="mb-6 ">
                    <label for="aspirasi-nama" class="block mb-2 text-sm font-medium text-gray-600 ">Judul</label>
                    <input type="text" id="aspirasi-nama" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        value="{{ old('title', $data ? $data->title : '') }}" placeholder="Judul Artikel" required>
                </div>

                <div x-data="showImage()" class="w-full">
                    <div class="mb-6">
                        <div>
                            <label class="inline-block mb-2 text-gray-500">Cover Artikel</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col w-full border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                    <div class="relative flex flex-col items-center justify-center pt-7">
                                        <img id="preview" class="absolute inset-0 h-[141px] mx-auto object-fit"
                                            src="{{ $data ? ($data->cover ? asset($data->cover) : '') : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                            pilih foto</p>
                                    </div>
                                    <input type="file" class="opacity-0" accept="image/*" @change="showPreview(event)"
                                        name="cover" />
                                </label>
                            </div>
                            @if ($errors->has('cover'))
                                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $errors->first('cover') }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>


                <label for="e-link-info" class="block mb-2 text-sm font-medium text-gray-700 ">Konten</label>

                <div class="border p-3 border-gray-200 rounded-lg">
                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input id="is_highline" type="checkbox" name="is_highline" value="1"
                                {{ $data ? ($data->is_highline ? 'checked' : '') : '' }}
                                class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="is_highline" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tampilkan
                            Sebagai Highline</label>
                    </div>
                    <ul class="grid gap-6 w-full xl:grid-cols-4 lg:grid-cols-3 grid-cols-2 mb-5">
                        <li>
                            <input type="radio" id="tr-link" name="tr-konten"
                                {{ $data ? ($data->type_article == 1 ? 'checked' : '') : '' }} value="tr-link"
                                class="hidden peer" required checked onclick="switchtambahKonten()">
                            <label for="tr-link"
                                class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold text-center">Link</div>
                                    <div class="w-full text-center">Konten Menggunakan Link</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="tr-file" name="tr-konten"
                                {{ $data ? ($data->type_article == 2 ? 'checked' : '') : '' }} value="tr-file"
                                class="hidden peer" onclick="switchtambahKonten()">
                            <label for="tr-file"
                                class="inline-flex justify-center items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold text-center">Ketik Artikel</div>
                                    <div class="w-full text-center">Membuat artikel sendiri</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                    <input type="hidden" id="type_article" name="type_article" value="1">
                    <div class="mb-3 " id="div-tambahlink">
                        <label for="link-info" class="block mb-2 text-sm font-medium text-gray-700 ">Link</label>
                        <input type="text" id="link-info" name="link"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " required
                            value="{{ $data ? ($data->type_article == 1 ? $data->description : '') : '' }}"
                            placeholder="Masukan Link Url">
                    </div>


                    <div class="mb-3  hidden" id="div-tambahfile">
                        <label class="block mb-2 text-sm font-medium text-gray-700 " for="upload-file">Ketik
                            Artikel</label>
                        <textarea class="summernote bg-white" id="isiartikel" name="description">{{ $data ? ($data->type_article == 2 ? $data->description : '') : '' }} </textarea>
                        <span id="errorArticle"
                            class="hidden flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">Silahkan
                            megisi artikel
                        </span>
                    </div>
                </div>


                <div class="mb-6 flex justify-end items-end">

                    <div>
                        <button type="submit"
                            class="flex mt-6 items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                cast
                            </span>Terbitkan
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>
@endsection

@section('morejs')
    <script>
        $('.summernote').summernote({
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

        $(document).ready(function() {
            switchtambahKonten();
        })

        function switchtambahKonten() {
            if (document.querySelector('input[name="tr-konten"]:checked').value == "tr-link") {
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
                document.querySelector('#link-info').setAttribute('required', '');
                document.getElementById('type_article').value = '1';
            } else {
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
                document.querySelector('#link-info').removeAttribute('required');
                document.getElementById('type_article').value = '2';
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
            let type = document.getElementById('type_article').value

            console.log('asdasd', text)

        }
    </script>
@endsection
