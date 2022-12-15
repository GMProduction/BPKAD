@extends('admin.base')
@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/basic.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/dropzone.min.css') }} ">
@endsection

@section('css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ \Illuminate\Support\Facades\Session::get('success') }}"
            })
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire({
                icon: "error",
                text: "{{ \Illuminate\Support\Facades\Session::get('failed') }}"
            })
        </script>
    @endif
    <div class="panel h-full">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900  ">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
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
                        <a href="{{ route('customize.bidang') }}"
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
                        <button onclick="changeTab(1)"
                            class="tabs-btn  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="sekretariat-tab" data-tabs-target="#sekretariat" type="button" role="tab"
                            aria-controls="sekretariat" aria-selected="false">Sekretariat
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button onclick="changeTab(2)"
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="anggaran-tab" data-tabs-target="#anggaran" type="button" role="tab"
                            aria-controls="anggaran" aria-selected="false">Anggaran
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button onclick="changeTab(3)"
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="perbendaharaan-tab" data-tabs-target="#perbendaharaan" type="button" role="tab"
                            aria-controls="perbendaharaan" aria-selected="false">Perbendaharaan dan Akuntansi
                        </button>
                    </li>
                    <li role="presentation">
                        <button onclick="changeTab(4)"
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="aset-tab" data-tabs-target="#aset" type="button" role="tab" aria-controls="aset"
                            aria-selected="false">Aset
                        </button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">

                <div class=" p-4 rounded-lg  " id="sekretariat" role="tabpanel" aria-labelledby="sekretariat-tab">
                    @if ($data_secretarial_sector)
                        <form id="formImg" class="dropzone mb-6" action="{{ route('customize.bidang.image') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input value="{{ $data_secretarial_sector->id }}" type="hidden" name="id">
                            <!-- this is were the previews should be shown. -->
                            <div class="fallback">
                                <input name="image" type="file" multiple />
                            </div>
                        </form>
                    @endif
                    <form method="post" id="form-secretarial">
                        @csrf
                        <input type="hidden" name="type" value="secretarial">
                        <input type="hidden" name="id"
                            value="{{ $data_secretarial_sector ? $data_secretarial_sector->id : '' }}">
                        <div>
                            <div class="mb-6">
                                <label for="sekretariat-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Sekretariat</label>
                                <textarea class="summernote" id="sekretariat-tugas" name="job">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->job : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="sekretariat-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Sub
                                    Bidang</label>
                                <textarea class="summernote" id="sekretariat-sub" name="sub_sector">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->sub_sector : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="sekretariat-sub-tugas"
                                    class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Sub Bidang</label>
                                <textarea class="summernote" id="sekretariat-sub-tugas" name="sub_sector_job">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->sub_sector_job : '' }}</textarea>
                            </div>

                            <button type="submit" id="btn-save-secretarial"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    done
                                </span>Ubah
                            </button>
                        </div>
                    </form>

                </div>
                <div class=" p-4 rounded-lg hidden" id="anggaran" role="tabpanel" aria-labelledby="anggaran-tab">
                    @if ($data_budget_sector)
                        <form id="formImgbudget" class="dropzone mb-6" action="{{ route('customize.bidang.image') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input value="{{ $data_budget_sector->id }}" type="hidden" name="id">
                            <!-- this is were the previews should be shown. -->
                            <div class="fallback">
                                <input name="image" type="file" multiple />
                            </div>
                        </form>
                    @endif
                    <form method="post" id="form-budget">
                        @csrf
                        <input type="hidden" name="type" value="budget">
                        <input type="hidden" name="id"
                            value="{{ $data_budget_sector ? $data_budget_sector->id : '' }}">
                        <div>
                            <div class="mb-6">
                                <label for="anggaran-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Anggaran</label>
                                <textarea class="summernote" id="anggaran-tugas" name="job">{{ $data_budget_sector !== null ? $data_budget_sector->job : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="anggaran-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Sub
                                    Bidang</label>
                                <textarea class="summernote" id="anggaran-sub" name="sub_sector">{{ $data_budget_sector !== null ? $data_budget_sector->sub_sector : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="anggaran-sub-tugas"
                                    class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Sub Bidang</label>
                                <textarea class="summernote" id="anggaran-sub-tugas" name="sub_sector_job">{{ $data_budget_sector !== null ? $data_budget_sector->sub_sector_job : '' }}</textarea>
                            </div>

                            <button type="submit" id="btn-save-budget"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    done
                                </span>Ubah
                            </button>
                        </div>
                    </form>
                </div>
                <div class=" p-4 rounded-lg hidden" id="perbendaharaan" role="tabpanel"
                    aria-labelledby="perbendaharaan-tab">
                    @if ($data_financial_sector)
                        <form id="formImgfinancial" class="dropzone mb-6" action="{{ route('customize.bidang.image') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input value="{{ $data_financial_sector->id }}" type="hidden" name="id">
                            <!-- this is were the previews should be shown. -->
                            <div class="fallback">
                                <input name="image" type="file" multiple />
                            </div>
                        </form>
                    @endif
                    <form method="post" id="form-financial">
                        @csrf
                        <input type="hidden" name="type" value="financial">
                        <input type="hidden" name="id"
                            value="{{ $data_financial_sector ? $data_financial_sector->id : '' }}">

                        <div>
                            <div class="mb-6">
                                <label for="perbendaharaan-tugas"
                                    class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Perbendaharaan dan Akuntansi</label>
                                <textarea class="summernote" id="perbendaharaan-tugas" name="job">{{ $data_financial_sector !== null ? $data_financial_sector->job : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="perbendaharaan-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Sub
                                    Bidang</label>
                                <textarea class="summernote" id="perbendaharaan-sub" name="sub_sector">{{ $data_financial_sector !== null ? $data_financial_sector->sub_sector : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="perbendaharaan-sub-tugas"
                                    class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Sub Bidang</label>
                                <textarea class="summernote" id="perbendaharaan-sub-tugas" name="sub_sector_job">{{ $data_financial_sector !== null ? $data_financial_sector->sub_sector_job : '' }}</textarea>
                            </div>

                            <button type="button" id="btn-save-financial"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    done
                                </span>Ubah
                            </button>
                        </div>
                    </form>
                </div>
                <div class=" p-4 rounded-lg  hidden" id="aset" role="tabpanel" aria-labelledby="aset-tab">
                    @if ($data_asset_sector)
                        <form id="formImgasset" class="dropzone mb-6" action="{{ route('customize.bidang.image') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input value="{{ $data_asset_sector->id }}" type="hidden" name="id">
                            <!-- this is were the previews should be shown. -->
                            <div class="fallback">
                                <input name="image" type="file" multiple />
                            </div>
                        </form>
                    @endif
                    <form method="post" id="form-asset">
                        @csrf
                        <input type="hidden" name="type" value="asset">
                        <input type="hidden" name="id"
                            value="{{ $data_asset_sector ? $data_asset_sector->id : '' }}">

                        <div>
                            <div class="mb-6">
                                <label for="aset-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Aset</label>
                                <textarea class="summernote" id="aset-tugas" name="job">{{ $data_asset_sector !== null ? $data_asset_sector->job : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="aset-sub" class="block mb-2 text-sm font-medium text-gray-600 ">Sub
                                    Bidang</label>
                                <textarea class="summernote" id="aset-sub" name="sub_sector">{{ $data_asset_sector !== null ? $data_asset_sector->sub_sector : '' }}</textarea>
                            </div>

                            <div class="mb-6">
                                <label for="aset-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                    Sub Bidang</label>
                                <textarea class="summernote" id="aset-sub-tugas" name="sub_sector_job">{{ $data_asset_sector !== null ? $data_asset_sector->sub_sector_job : '' }}</textarea>
                            </div>

                            <button type="button" id="btn-save-asset"
                                class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    done
                                </span>Ubah
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="{{ asset('css/dropzone/js/dropzone.min.js') }} "></script>

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
        $('#btn-save-secretarial').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang sekertariat?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result) {
                    $('#form-secretarial').submit();
                }
            });
        });

        $('#btn-save-budget').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang anggaran?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result) {
                    $('#form-budget').submit();
                }
            });
        });

        $('#btn-save-financial').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang perbendaharaan dan akuntansi?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result) {
                    $('#form-financial').submit();
                }
            });
        });

        $('#btn-save-asset').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang asset?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result) {
                    $('#form-asset').submit();
                }
            });
        });

        function changeTab(a) {
            localStorage.setItem('sector_id', a);
        }

        Dropzone.options.formImg = {
            // paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            removedfile: function(file) {
                var idImg, name;
                console.log(file)
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                console.log(idImg);
                {{-- var name = JSON.parse(file.xhr.response)['payload']['image']; --}}
                {{-- var idImg = JSON.parse(file.xhr.response)['payload']['id']; --}}
                {{-- console.log('delete') --}}
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    sucess: function(data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function(file, xhr, formData) {
                file.myCustomName = "my-new-name" + file.name;
                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function(file, response) {

                console.log(file);
                console.log(response);
                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {
                this.options.resizeWidth = 650;
                this.options.resizeQuality = 0.75;
                console.log(this.options);
                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                sector_id = localStorage.getItem('sector_id');
                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'secretarial'
                }, function(data) {
                    console.log('ddddddddd', data)
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {
                            console.log('ddddddddd', value)

                            var mockFile = {
                                name: value['image'],
                                size: value['size'],
                                idImg: value['id']
                            };
                            myDropzone.displayExistingFile(mockFile, value['image']);
                        })

                    }
                })
                // $('.dz-image img').attr('height', '120');
            }

        };

        Dropzone.options.formImgbudget = {
            // paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            removedfile: function(file) {
                var idImg, name;
                console.log(file)
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                console.log(idImg);
                {{-- var name = JSON.parse(file.xhr.response)['payload']['image']; --}}
                {{-- var idImg = JSON.parse(file.xhr.response)['payload']['id']; --}}
                {{-- console.log('delete') --}}
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    sucess: function(data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function(file, xhr, formData) {
                file.myCustomName = "my-new-name" + file.name;
                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function(file, response) {

                console.log(file);
                console.log(response);
                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {
                this.options.resizeWidth = 650;
                this.options.resizeQuality = 0.75;
                console.log(this.options);
                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'budget'
                }, function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {
                            console.log('ddddddddd', value)

                            var mockFile = {
                                name: value['image'],
                                size: value['size'],
                                idImg: value['id']
                            };
                            myDropzone.displayExistingFile(mockFile, value['image']);
                        })

                    }
                })
                // $('.dz-image img').attr('height', '120');
            }

        };

        Dropzone.options.formImgfinancial = {
            // paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            removedfile: function(file) {
                var idImg, name;
                console.log(file)
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                console.log(idImg);
                {{-- var name = JSON.parse(file.xhr.response)['payload']['image']; --}}
                {{-- var idImg = JSON.parse(file.xhr.response)['payload']['id']; --}}
                {{-- console.log('delete') --}}
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    sucess: function(data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function(file, xhr, formData) {
                file.myCustomName = "my-new-name" + file.name;
                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function(file, response) {

                console.log(file);
                console.log(response);
                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {
                this.options.resizeWidth = 650;
                this.options.resizeQuality = 0.75;
                console.log(this.options);
                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'financial'
                }, function(data) {
                    console.log('ddddddddd', data)
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {
                            console.log('ddddddddd', value)

                            var mockFile = {
                                name: value['image'],
                                size: value['size'],
                                idImg: value['id']
                            };
                            myDropzone.displayExistingFile(mockFile, value['image']);
                        })

                    }
                })
                // $('.dz-image img').attr('height', '120');
            }

        };

        Dropzone.options.formImgasset = {
            // paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            removedfile: function(file) {
                var idImg, name;
                console.log(file)
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                console.log(idImg);
                {{-- var name = JSON.parse(file.xhr.response)['payload']['image']; --}}
                {{-- var idImg = JSON.parse(file.xhr.response)['payload']['id']; --}}
                {{-- console.log('delete') --}}
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    sucess: function(data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function(file, xhr, formData) {
                file.myCustomName = "my-new-name" + file.name;
                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function(file, response) {

                console.log(file);
                console.log(response);
                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {
                this.options.resizeWidth = 650;
                this.options.resizeQuality = 0.75;
                console.log(this.options);
                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'asset'
                }, function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {
                            console.log('ddddddddd', value)

                            var mockFile = {
                                name: value['image'],
                                size: value['size'],
                                idImg: value['id']
                            };
                            myDropzone.displayExistingFile(mockFile, value['image']);
                        })

                    }
                })
                // $('.dz-image img').attr('height', '120');
            }

        };
    </script>
@endsection
