@extends('admin.base')
@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
                        <a href="/admin/customize_bidang"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Customize
                            Bidang</a>
                    </div>
                </li>

            </ol>
        </nav>




        <div class="panel bg-white border">
            <div class="border-b border-gray-200  mb-4">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="sekretariat-tab" data-tabs-target="#sekretariat" type="button" role="tab"
                            aria-controls="sekretariat" aria-selected="false">Sekretariat</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="anggaran-tab" data-tabs-target="#anggaran" type="button" role="tab"
                            aria-controls="anggaran" aria-selected="false">Anggaran</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="perbendaharaan-tab" data-tabs-target="#perbendaharaan" type="button" role="tab"
                            aria-controls="perbendaharaan" aria-selected="false">Perbendaharaan dan Akuntansi</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="aset-tab" data-tabs-target="#aset" type="button" role="tab" aria-controls="aset"
                            aria-selected="false">Aset</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class=" p-4 rounded-lg  " id="sekretariat" role="tabpanel" aria-labelledby="sekretariat-tab">
                    <div>
                        <div class="mb-6">
                            <label for="sekretariat-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sekretariat</label>
                            <div class="summernote" id="sekretariat-tugas"></div>
                        </div>

                        <div class="mb-6">
                            <label for="sekretariat-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Sub Bidang</label>
                            <div class="summernote" id="sekretariat-sub"></div>
                        </div>

                        <div class="mb-6">
                            <label for="sekretariat-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sub Bidang</label>
                            <div class="summernote" id="sekretariat-sub-tugas"></div>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="anggaran" role="tabpanel" aria-labelledby="anggaran-tab">
                    <div>
                        <div class="mb-6">
                            <label for="anggaran-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Anggaran</label>
                            <div class="summernote" id="anggaran-tugas"></div>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Sub Bidang</label>
                            <div class="summernote" id="anggaran-sub"></div>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sub Bidang</label>
                            <div class="summernote" id="anggaran-sub-tugas"></div>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="perbendaharaan" role="tabpanel"
                    aria-labelledby="perbendaharaan-tab">
                    <div>
                        <div class="mb-6">
                            <label for="perbendaharaan-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Perbendaharaan dan Akuntansi</label>
                            <div class="summernote" id="perbendaharaan-tugas"></div>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Sub Bidang</label>
                            <div class="summernote" id="perbendaharaan-sub"></div>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub-tugas"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sub Bidang</label>
                            <div class="summernote" id="perbendaharaan-sub-tugas"></div>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg  hidden" id="aset" role="tabpanel" aria-labelledby="aset-tab">
                    <div>
                        <div class="mb-6">
                            <label for="aset-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Aset</label>
                            <div class="summernote" id="aset-tugas"></div>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Sub Bidang</label>
                            <div class="summernote" id="aset-sub"></div>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sub Bidang</label>
                            <div class="summernote" id="aset-sub-tugas"></div>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('morejs')
    <script>
        $('.summernote').summernote({
            placeholder: '',
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
    </script>
@endsection


</body>

</html>
