@extends('admin.customize.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/basic.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/dropzone.min.css') }} ">
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick.css') }} " />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick-theme.css') }} " />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #slider {
            opacity: 1;
            transition: opacity 1s;
        }

        #slider.fadeOut {
            opacity: 0;
        }

        .isDisabled {
            color: white;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }
    </style>
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
                <h4 class="panel-title">Slider Utama</h4>
            </div>
            <p class="help-block">
                Gambar yang Anda unggah di sini akan ditampilkan di <strong>halaman utama (landing page)</strong>. Format:
                <strong>JPG/PNG</strong>. Maks: <strong>2MB</strong>.
            </p>

            <div class="overflow-x-auto relative shadow-sm ">
                <form id="formImgbudget" class="dropzone mb-6" action="{{ route('customize.slider.image') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input value="" type="hidden" name="id">
                    <!-- this is were the previews should be shown. -->
                    <div class="fallback">
                        <input name="image" type="file" multiple accept=".jpg, .png" />
                    </div>
                </form>
            </div>
            <div class="alert alert-info small mt-3">
                <strong>Catatan:</strong> Gambar akan digunakan untuk slider di halaman utama.
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('css/dropzone/js/dropzone.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <!--Datatables -->
    <script>
        let dataUrl = '{{ route('customize.aplikasi.online.datatable') }}';
        $(document).ready(function() {

            // .columns.adjust()
            // .responsive.recalc();
        });

        Dropzone.options.formImgbudget = {
            // paramName: 'image',
            acceptedFiles: 'image/jpeg,image/png',
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

                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.slider.image') }}',
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
                // file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function(file, done) {
                // this.options.resizeWidth = 650;
                // this.options.resizeQuality = 0.75;
                // console.log(this.options);
                done();
                return;
            },
            init: async function() {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.slider.image') }}', function(data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function(key, value) {
                            console.log('ddddddddd', value)

                            var mockFile = {
                                name: value['image'],
                                // size: value['size'],
                                idImg: value['id']
                            };
                            myDropzone.displayExistingFile(mockFile, value['image']);
                            $('.dz-preview .dz-details .dz-size').remove()

                        })

                    }
                })

                // $('.dz-image img').attr('height', '120');
            }

        };
    </script>
@endsection
