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
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/0 z-[-1]  relative ">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="sm:font-bold text-white sm:text-md text-sm font-light">Artikel terbaru dari kami</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
        src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" ">

        <div
            class=" artikel-slide   relative bg-white m-16 overflow-hidden transition duration-300 cursor-pointer hover:scale-105">
            <div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white ">

                <a href="#" class="absolute w-full h-full">
                    <img class="absolute w-full h-full object-cover "
                        src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg" />
                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">
                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">

                            <a class=" text-white text-sm mt-3" data-aos="fade-right">18 Nov 2022</a>

                            <a class="font-bold text-white text-lg" data-aos="fade-right">Badan Pengelolaan Keuangan & Aset
                                Daerah Kota
                                Surakarta</a>

                        </div>
                    </div>
                </a>
            </div>
            <div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white ">

                <a href="#" class="absolute w-full h-full">
                    <img class="absolute w-full h-full object-cover "
                        src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium" />
                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">
                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">

                            <a class=" text-white text-sm mt-3" data-aos="fade-right">17 Nov 2022</a>

                            <a class="font-bold text-white text-lg" data-aos="fade-right">Wali Kota Surakarta
                                @gibran_tweet
                                sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat
                                karena
                                persoalan teknis.</a>

                        </div>
                    </div>
                </a>
            </div>
        </div>


        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Artikel Terbaru</p>
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 sm:px-16 p-5 ">
            <a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08"
                target="_blank"
                class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">
                        <img class="w-full h-full object-cover rounded-md "
                            src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium" />

                    </div>
                </div>

                <p class="italic font-bold text-md text-center px-3 pb-3">Wali Kota Surakarta
                    @gibran_tweet
                    sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat
                    karena
                    persoalan teknis.
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
                href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">
                        <img class="w-full h-full object-cover rounded-md "
                            src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg" />

                    </div>
                </div>

                <p class="italic font-bold text-md text-center px-3 pb-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari
                    Solo,
                    Alat Berat Ikut Dikerahkan</p>
            </a>
            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
                href="https://solo.suaramerdeka.com/solo-raya/pr-055482435/kawasan-sriwedari-solo-dibersihkan-gerbang-sisi-utara-kembali-dibuka"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg" />
                </div>

                <p class="italic font-bold text-md text-center px-3 pb-3">
                    Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka
                </p>

            </a>


            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />
                </div>

                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>

            </a>

        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <script>
        $('.artikel-slide').slick({
            centerPadding: '40px',
            slidesToShow: 1,
            focusOnSelect: 1,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 760,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@endsection
