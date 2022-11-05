@extends('admin.base')

@section('head')

@endsection

@section('css')
@endsection

@section('content')
    <div class="panel h-full">

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
                        <a href="/admin/customize_beranda"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Customize
                            Profil</a>
                    </div>
                </li>

            </ol>
        </nav>

        <p class="title">Tampilan Profil</p>

        <div class="p-5 border bg-white shadow-md">


            <div class="mb-6">
                <label for="sejarah-text" class="block mb-2 text-sm font-medium text-gray-600 ">Visi</label>
                <textarea type="text" id="sejarah-text" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="sejarah"></textarea>
            </div>

            <div class="mb-6">
                <label for="sejarah-text" class="block mb-2 text-sm font-medium text-gray-600 ">Visi</label>
                <textarea type="text" id="sejarah-text" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="sejarah"></textarea>
            </div>

            <label for="sejarah-text" class="block mb-2 text-sm font-medium text-gray-600 ">Gambar Struktur
                Organisasi</label>
            <div class="border p-3 rounded-lg mb-6 ">
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer   hover:bg-gray-100 0  ">
                        <div class="flex flex-col justify-center items-center pt-5 pb-6">
                            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click
                                    to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </div>

            <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                class="flex items-center text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                <span class="material-symbols-outlined text-white mr-3">
                    domain_verification

                </span>Submit
            </button>

        </div>
    @endsection

    @section('morejs')


    @endsection


    </body>

    </html>
