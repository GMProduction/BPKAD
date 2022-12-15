@extends('base')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick.css') }} " />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick-theme.css') }} " />

    <style>
        #slider {
            opacity: 1;
            transition: opacity 1s;
        }

        #slider.fadeOut {
            opacity: 0;
        }
    </style>
@endsection

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl mb-3 inline-block mr-3">Aset </a> <a
                class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Bidang Aset dipimpin oleh
                seorang Kepala Bidang yang berkedudukan dibawah dan bertanggung jawab kepada Kepala Badan melalui
                Sekretaris</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
        src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">

        <div
            class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3 ">Tugas Bidang Aset</p>
            <p class="text-sm   mx-auto">{!! $data ? $data->job : '' !!}</p>

        </div>
        <div
            class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500 hover:scale-110">
            <p class="text-primary font-bold text-3xl italic mb-3  ">Sub Bidang </p>
            <p class="text-sm  md:w-[50%] sm:w-[80%] w-[95%]  mb-3">{!! $data ? $data->sub_sector : '' !!}</p>



            <p class="text-primary font-bold text-3xl italic   mb-6 mt-10">Tugas Sub Bidang</p>
            <p class="text-sm   mx-auto mb-3">{!! $data ? $data->sub_sector_job : '' !!}</p>

        </div>
        @if($data && $data->images)
            <div class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 relative max-h-max">
                <div class="sm:w-[100%] w-[100%]  mx-auto">
                    <p class="text-primary font-bold text-3xl italic mb-6  ">Gallery </p>
                    <div class="slider-for dark mb-3">
                        @foreach($data->images as $d)
                            <img src="{{ asset($d->image) }}" class="max-h-[500px] cursor-pointer"
                                 onclick="showModal('{{ asset($d->image) }}')"/>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($data->images as $d)
                            <img src="{{ asset($d->image) }}" class="max-h-[150px]"/>
                        @endforeach


                    </div>
                </div>
            </div>
    @endif

        <!-- The Modal -->
        <div id="modal"
            class="hidden fixed top-0 left-0 z-80 w-screen h-screen bg-black/70 flex justify-center items-center z-50"
            onclick="closeModal()">

            <!-- The close button -->
            <a class="fixed z-90 top-6 right-8 text-white text-5xl font-bold" href="javascript:void(0)"
                onclick="closeModal()">&times;</a>

            <!-- A big image will be displayed here -->
            <img id="modal-img" class="max-w-[90%] max-h-[90%]  object-cover" />
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav',
            lazyLoad: 'ondemand',
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            centerMode: true,
            focusOnSelect: true,
            arrows: true,
            lazyLoad: 'ondemand',
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
            ]
        });
    </script>

    <script>
        // Get the modal by id
        var modal = document.getElementById("modal");

        // Get the modal image tag
        var modalImg = document.getElementById("modal-img");

        // this function is called when a small image is clicked
        function showModal(src) {
            modal.classList.remove('hidden');
            modalImg.src = src;
        }

        // this function is called when the close button is clicked
        function closeModal() {
            modal.classList.add('hidden');
        }
    </script>
@endsection
