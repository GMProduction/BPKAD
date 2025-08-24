@extends('admin.customize.base')
@section('head')
@endsection

@section('css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="{{ asset('css/dropzone/css/basic.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/dropzone.min.css') }} ">

    <!-- include summernote css/js-->
    <link href="{{ asset('js/admin/summernote-bs5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin/summernote-bs5.min.js') }}"></script>
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

        <div class="panel panel-default">
            <div class="alert alert-info small">
                <strong>Catatan:</strong> Form ini digunakan untuk mengelola konten bidang yang akan ditampilkan di halaman
                Profil BPKAD.
            </div>

            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Bidang BPKAD</h4>
                </div>
            </div>

            <div class="tabs-wrapper border p-3 rounded">
                <ul class="nav nav-underline" id="bpkadTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="sekretariat-tab" data-bs-toggle="tab"
                            data-bs-target="#sekretariat" type="button" role="tab" aria-controls="sekretariat"
                            aria-selected="true">Sekretariat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="anggaran-tab" data-bs-toggle="tab" data-bs-target="#anggaran"
                            type="button" role="tab" aria-controls="anggaran" aria-selected="false">Anggaran</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="perbendaharaan-tab" data-bs-toggle="tab"
                            data-bs-target="#perbendaharaan" type="button" role="tab" aria-controls="perbendaharaan"
                            aria-selected="false">Perbendaharaan &amp; Akuntansi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="aset-tab" data-bs-toggle="tab" data-bs-target="#aset" type="button"
                            role="tab" aria-controls="aset" aria-selected="false">Aset</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="uptd-tab" data-bs-toggle="tab" data-bs-target="#uptd" type="button"
                            role="tab" aria-controls="uptd" aria-selected="false">UPTD</button>
                    </li>
                </ul>

                <div class="tab-content panel-body" id="bpkadTabsContent">
                    <!-- Sekretariat Tab -->
                    <div class="tab-pane fade show active" id="sekretariat" role="tabpanel"
                        aria-labelledby="sekretariat-tab">
                        @if ($data_secretarial_sector)
                            <form id="formImg" class="dropzone mt-4" action="{{ route('customize.bidang.image') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="secretarial">
                                <div class="fallback">
                                    <input name="image" type="file" multiple />
                                </div>
                            </form>
                        @endif
                        <form method="post" class="form-horizontal mt-4">
                            @csrf
                            <input type="hidden" name="type" value="secretarial">
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sekretariat</label>
                                <textarea class="form-control summernote" name="job">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->job : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->sub_sector : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector_job">{{ $data_secretarial_sector !== null ? $data_secretarial_sector->sub_sector_job : '' }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class=" bt-primary">
                                    <span class="material-symbols-outlined">save</span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Anggaran Tab -->
                    <div class="tab-pane fade" id="anggaran" role="tabpanel" aria-labelledby="anggaran-tab">
                        @if ($data_budget_sector)
                            <form id="formImgbudget" class="dropzone mt-4"
                                action="{{ route('customize.bidang.image') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="budget">
                                <div class="fallback">
                                    <input name="image" type="file" multiple />
                                </div>
                            </form>
                        @endif
                        <form method="post" class="form-horizontal mt-4">
                            @csrf
                            <input type="hidden" name="type" value="budget">
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Anggaran</label>
                                <textarea class="form-control summernote" name="job">{{ $data_budget_sector !== null ? $data_budget_sector->job : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector">{{ $data_budget_sector !== null ? $data_budget_sector->sub_sector : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector_job">{{ $data_budget_sector !== null ? $data_budget_sector->sub_sector_job : '' }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="bt-primary">
                                    <span class="material-symbols-outlined">save</span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Perbendaharaan Tab -->
                    <div class="tab-pane fade" id="perbendaharaan" role="tabpanel" aria-labelledby="perbendaharaan-tab">
                        @if ($data_financial_sector)
                            <form id="formImgfinancial" class="dropzone mt-4"
                                action="{{ route('customize.bidang.image') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="financial">
                                <div class="fallback">
                                    <input name="image" type="file" multiple />
                                </div>
                            </form>
                        @endif
                        <form method="post" class="form-horizontal mt-4">
                            @csrf
                            <input type="hidden" name="type" value="financial">
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Perbendaharaan dan Akuntansi</label>
                                <textarea class="form-control summernote" name="job">{{ $data_financial_sector !== null ? $data_financial_sector->job : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector">{{ $data_financial_sector !== null ? $data_financial_sector->sub_sector : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector_job">{{ $data_financial_sector !== null ? $data_financial_sector->sub_sector_job : '' }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class=" bt-primary">
                                    <span class="material-symbols-outlined">save</span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Aset Tab -->
                    <div class="tab-pane fade" id="aset" role="tabpanel" aria-labelledby="aset-tab">
                        @if ($data_asset_sector)
                            <form id="formImgasset" class="dropzone mt-4" action="{{ route('customize.bidang.image') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="asset">
                                <div class="fallback">
                                    <input name="image" type="file" multiple />
                                </div>
                            </form>
                        @endif
                        <form method="post" class="form-horizontal mt-4">
                            @csrf
                            <input type="hidden" name="type" value="asset">
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Aset</label>
                                <textarea class="form-control summernote" name="job">{{ $data_asset_sector !== null ? $data_asset_sector->job : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector">{{ $data_asset_sector !== null ? $data_asset_sector->sub_sector : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector_job">{{ $data_asset_sector !== null ? $data_asset_sector->sub_sector_job : '' }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class=" bt-primary">
                                    <span class="material-symbols-outlined">save</span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- UPTD Tab -->
                    <div class="tab-pane fade" id="uptd" role="tabpanel" aria-labelledby="uptd-tab">
                        @if ($data_uptd_sector)
                            <form id="formImguptd" class="dropzone mt-4" action="{{ route('customize.bidang.image') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="uptd">
                                <div class="fallback">
                                    <input name="image" type="file" multiple />
                                </div>
                            </form>
                        @endif
                        <form method="post" class="form-horizontal mt-4">
                            @csrf
                            <input type="hidden" name="type" value="uptd">
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas UPTD</label>
                                <textarea class="form-control summernote" name="job">{{ $data_uptd_sector !== null ? $data_uptd_sector->job : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector">{{ $data_uptd_sector !== null ? $data_uptd_sector->sub_sector : '' }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Tugas Sub Bidang</label>
                                <textarea class="form-control summernote" name="sub_sector_job">{{ $data_uptd_sector !== null ? $data_uptd_sector->sub_sector_job : '' }}</textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class=" bt-primary">
                                    <span class="material-symbols-outlined">save</span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="{{ asset('css/dropzone/js/dropzone.min.js') }} "></script>

    <script>
        $(document).ready(function() {
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
        });


        $('#btn-save-secretarial').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang Sekertariat?',
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

        $('#btn-save-uptd').on('click', function(e) {
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

        $('#btn-save-uptd').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin merubah data bidang uptd?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(function(result) {
                if (result) {
                    $('#form-uptd').submit();
                }
            });
        });

        function changeTab(a) {
            localStorage.setItem('sector_id', a);
        }

        Dropzone.options.formImg = {
            paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function(file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }

                alert("gambar dihapus")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        image: name,
                        type: 'secretarial',
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('success: ' + data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', status, error);
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

                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {

                done();
                return;
            },
            init: async function() {
                console.log('Init Dropzone');
                let myDropzone = this;

                sector_id = localStorage.getItem('sector_id');
                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'secretarial'
                }, function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {

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
            paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function(file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                alert("gambar dihapus")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        type: 'budget',
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function(file, xhr, formData) {
                formData.append("fileName", file.myCustomName);

                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function(file, response) {

                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {

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

                            var mockFile = {
                                name: value['image'],
                                size: value['size'],
                                idImg: value['id']
                            };

                            console.log('Memuat gambar:', value[
                                'image']); // ✅ Nama file yang diload
                            myDropzone.displayExistingFile(mockFile, value['image']);
                        })

                    }
                })
                // $('.dz-image img').attr('height', '120');
            }

        };

        Dropzone.options.formImgfinancial = {
            paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function(file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                alert("gambar dihapus")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        type: 'financial',
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
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

                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {

                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'financial'
                }, function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {

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
            paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function(file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                alert("gambar dihapus")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        type: 'asset',
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
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

                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {

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

        Dropzone.options.formImguptd = {
            paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function(file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                alert("gambar dihapus")
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.bidang.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        type: 'uptd',
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
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

                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {

                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.bidang.image') }}', {
                    'type': 'uptd'
                }, function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {

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
