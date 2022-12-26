@extends('admin.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/basic.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/dropzone/css/dropzone.min.css') }} ">
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick-theme.css') }} "/>

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
                        <a href="{{route('customize.slider')}}"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Customize
                            Slider</a>
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
        <div class="panel bg-white border">
            <div class="flex justify-between mb-3 items-end">
                <p class=" font-semibold">Slider Homepage</p>
            </div>
            <div class="overflow-x-auto relative shadow-sm ">
                <form id="formImgbudget" class="dropzone mb-6" action="{{ route('customize.slider.image') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    <input value="" type="hidden" name="id">
                    <!-- this is were the previews should be shown. -->
                    <div class="fallback">
                        <input name="image" type="file" multiple/>
                    </div>
                </form>
{{--                <div class="flex justify-center pb-5 h-[50px]">--}}
{{--                    <div class="w-[50%] ">--}}
{{--                        <img id="slider" src="{{ asset('assets/local/slide.jpg') }}"--}}
{{--                             class="absolute z-[-2] w-[50%]   "/>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
        $(document).ready(function () {

            // .columns.adjust()
            // .responsive.recalc();
        });

        Dropzone.options.formImgbudget = {
            // paramName: 'image',
            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
            addRemoveLinks: true,
            maxFilesize: 2,
            removedfile: function (file) {
                var idImg, name;
                if (file.xhr) {
                    idImg = JSON.parse(file.xhr.response)['payload']['id'];
                    name = JSON.parse(file.xhr.response)['payload']['image'];
                } else {
                    idImg = file['idImg'];
                    name = file['name'];
                }
                {{-- var name = JSON.parse(file.xhr.response)['payload']['image']; --}}
                {{-- var idImg = JSON.parse(file.xhr.response)['payload']['id']; --}}
                {{-- console.log('delete') --}}
                $.ajax({
                    type: 'POST',
                    url: '{{ route('customize.slider.image') }}',
                    data: {
                        name: name,
                        id: idImg,
                        action: 2,
                        '_token': '{{ csrf_token() }}',
                    },
                    sucess: function (data) {
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                $('.dz-message').remove()
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) :
                    void 0;
            },
            sending: function (file, xhr, formData) {
                file.myCustomName = "my-new-name" + file.name;
                // formData.append("filesize", file.size);
                formData.append("fileName", file.myCustomName);
                formData.append("id_achievement", $('#visi #id').val());
            },
            success: function (file, response) {

                console.log(file);
                console.log(response);
                file.previewElement.querySelector("img").src = response['payload']['image'];
                file.previewElement.children[1].children[1].children[0].innerHTML = response['payload']['image'];
                // file.previewElement.children[1].children[0].children[0].innerHTML = response['payload']['size'];
                $('.dz-image img').attr('height', '120')

            },
            accept: function (file, done) {
                // this.options.resizeWidth = 650;
                // this.options.resizeQuality = 0.75;
                // console.log(this.options);
                done();
                return;
            },
            init: async function () {
                let myDropzone = this;

                var existing_files = $('[name="image[]"]').val();
                $.get('{{ route('customize.slider.image') }}', function (data) {
                    if (data['status'] === 200) {
                        var img = data['payload'];
                        $.each(img, function (key, value) {
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
