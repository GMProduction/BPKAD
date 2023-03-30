@extends('base')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/import/slick-1.8.1/slick/slick-theme.css') }} "/>

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
    <div class="mt-[-89px] sm:h-[796px] h-[350px] w-[100%] bg-black/30 z-[-1]  relative">
        <div class="absolute sm:bottom-[200px] bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white text-4xl" data-aos="fade-left">BPKAD </a> <a class="font-bold text-4xl text-white"
                                                                                        data-aos="fade-left">KOTA
                SURAKARTA</a> <br>
            <a class="font-bold text-white " data-aos="fade-right">Badan Pengelolaan Keuangan & Aset Daerah Kota
                Surakarta</a>
        </div>
    </div>

    <img id="slider" src="{{ asset('assets/local/slide.jpg') }}"
         class="absolute z-[-2] w-[100%] sm:h-[796px] h-[350px] object-cover top-0 left-0"/>


    <div class="mt-[-70px] min-h-[150px] w-[90%] mx-[auto] rounded-md bg-white shadow-md flex items-center "
         data-aos="fade-up">
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-[auto] mb-[auto] w-[100%] ">
            <div class="flex  md:justify-center justify-start  sm:mx-0 mx-5 sm:my-0 my-1 sm:mt-0 mt-3 border-r">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    mail
                </span>
                <div>
                    <p class="text-primary font-bold italic">Email</p>
                    <p>bpkad@surakarta.go.id</p>
                </div>
            </div>

            <div class="flex  md:justify-start justify-start sm:mx-0 mx-5 sm:my-0 my-1 border-r">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    location_on
                </span>
                <div>
                    <p class="text-primary font-bold italic">Alamat</p>
                    <p>Jl. Jend Sudirman No. 2 ,
                        Kompleks Balaikota Surakarta</p>
                </div>
            </div>

            <div class="flex  md:justify-start justify-start sm:mx-0 mx-5 sm:my-0 my-1 border-r">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    call
                </span>
                <div>
                    <p class="text-primary font-bold italic">Phone</p>
                    <p>(0271) 648089</p>
                </div>
            </div>

            <div class="flex  md:justify-start justify-start sm:mx-0 mx-5 sm:my-0 my-1 sm:mb-0 mb-3">
                <span class="material-symbols-outlined font-bold  text-primary mr-2 ">
                    schedule
                </span>
                <div>
                    <p class="text-primary font-bold italic">Jam Kerja</p>
                    <p>Senin-Kamis 07.30-16.00 WIB</p>
                    <p>Jumat 07.15-11.30 WIB</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container grid sm:grid-cols-8 grid-cols-1 gap-4 mt-16 mb-6">

        <div class="col-span-1">
            {{-- <img src="{{ asset('assets/local/mantab_no_korupsi.png') }}" class="w-[40%] m-auto" /> --}}
        </div>


        <div class="col-span-5 sm:mx-0 mx-5">
            <p class="text-primary font-bold text-3xl italic mb-3 " data-aos="fade-up">Tentang BPKAD Surakarta?</p>
            <p class="text-sm" data-aos="fade-up">{!! $history ? $history->history : '' !!}</p>
        </div>
    </div>

    <div class="bg-transparent curved">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#23569F" fill-opacity="1"
                  d="M0,96L60,90.7C120,85,240,75,360,96C480,117,600,171,720,176C840,181,960,139,1080,144C1200,149,1320,203,1380,229.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>


        </svg>

        <div class="bg-primary w-[100%] pb-10 sm:mt-[-40px] md:mt-[-60px] mt-[-0] sm:px-10 px-5">

            <p class="text-white font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Aplikasi Online</p>
            <p class="text-white/80 text-sm text-center mb-10" data-aos="fade-up">Aplikasi Online yang dapat membantumu</p>

            <div class="slider-aplikasi" data-aos="fade-up">
                {{-- @forelse($application as $ap)
                    <a class="block " href="{{$ap->url}}" target="_blank">
                        <div
                            class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                            <div>
                                <img src="{{ asset($ap->image) }}"
                                     class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                            </div>
                            <div class="col-span-2">
                                <p class="text-white font-bold text-2xl italic mb-3">{{$ap->name}}</p>
                                <p class="text-sm text-white  mb-1 font-bold ">{{$ap->short_description}}</p>
                                <p class="text-sm text-white/80 ">{{$ap->description}}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="flex justify-center">
                        <p>Tidak ada aplikasi online</p>
                    </div>
                @endforelse --}}
               <a class="block " href="https://surakartakota.fmis.id//" target="_blank">
                   <div
                       class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                       <div>
                           <img src="{{ asset('assets/local/simdang.png') }}"
                                class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                       </div>
                       <div class="col-span-2">
                           <p class="text-white font-bold text-2xl italic mb-3">FMIS</p>
                           <p class="text-sm text-white  mb-1 font-bold "> Financial Management Information System</p>
                           <p class="text-sm text-white/80 "> Aplikasi yang dikembangkan dari basis SIMDA untuk mempermudah
                               manajemen keuangan daerah pada Pemerintah Kota Surakarta</p>
                       </div>

                   </div>
               </a>
               <a class="block " href="https://hibah.surakarta.go.id/" target="_blank">
                   <div
                       class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                       <div>
                           <img src="{{ asset('assets/local/hibah-online.png') }}"
                                class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                       </div>
                       <div class="col-span-2">
                           <p class="text-white font-bold text-2xl italic mb-3">HIBAH ONLINE</p>
                           <p class="text-sm text-white mb-1 font-bold ">Aplikasi Hibah Online Kota Surakarta</p>
                           <p class="text-sm text-white/80 ">Aplikasi untuk memudahkan dalam pengajuan permohonan bantuan
                               hibah
                               dan bansos oleh masyarakat ataupun organisasi yang ada di kota Surakarta</p>
                       </div>

                   </div>
               </a>
               <a class="block " href="https://bppkad.surakarta.go.id/sinta/" target="_blank">
                   <div
                       class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                       <div>
                           <img src="{{ asset('assets/local/sinta.png') }}"
                                class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                       </div>
                       <div class="col-span-2">
                           <p class="text-white font-bold text-2xl italic mb-3">SINTA</p>
                           <p class="text-sm text-white mb-1 font-bold">Sistem Informasi Tanah Pemerintah Kota Surakarta
                           </p>
                           <p class="text-sm text-white/80 ">Aplikasi untuk memudahkan dalam pencarian tanah Hak Pakai
                               Pemerintah Kota Surakarta berdasarkan klasifikasi penggunaan dan wilayah</p>
                       </div>

                   </div>
               </a>
               <a class="block " href="https://bppkad.surakarta.go.id/sikendis/" target="_blank">
                   <div
                       class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                       <div>
                           <img src="{{ asset('assets/local/sikendis.png') }}"
                                class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                       </div>
                       <div class="col-span-2">
                           <p class="text-white font-bold text-2xl italic mb-3">SIKENDIS</p>
                           <p class="text-sm text-white mb-1 font-bold">Sistem Informasi Kendaraan Dinas Pemerintah Kota
                               Surakarta</p>
                           <p class="text-sm text-white/80 ">Aplikasi untuk memudahkan dalam penatausahaan Kendaraan Dinas
                               Pemerintah Kota Surakarta</p>
                       </div>

                   </div>
               </a>

               <a class="block " href="https://bppkad.surakarta.go.id/sikendis/" target="_blank">
                   <div
                       class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                       <div>
                           <img src="{{ asset('assets/local/siperon.png') }}"
                                class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5"/>
                       </div>
                       <div class="col-span-2">
                           <p class="text-white font-bold text-2xl italic mb-3">SIPERON<i
                                   class="mdi mdi-skip-previous-outline:"></i></p>
                           <p class="text-sm text-white mb-1 font-bold">Sistem Persediaan Online Kota Surakarta</p>
                           <p class="text-sm text-white/80 ">Aplikasi untuk mempercepat tata kelola persediaan dengan
                               menggunakan sistem informasi yang dilaksanakan secara online diseluruh skpd</p>
                       </div>

                   </div>
               </a>


            </div>

        </div>

        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="sm:mt-[-100px] md:mt-[-50px] mt-[-10px] rotate-180" viewBox="0 0 1440 320" >
            <path fill="#23569F" fill-opacity="1"
                d="M0,160L60,176C120,192,240,224,360,208C480,192,600,128,720,138.7C840,149,960,235,1080,250.7C1200,267,1320,213,1380,186.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg> --}}
    </div>

    <div class="bg-primary pt-16 pb-16">

        <p class="text-white font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Video Terbaru</p>
        <p class="text-white  text-sm text-center md:w-[50%] sm:w-[80%] w-[95%] mx-auto" data-aos="fade-up">Video dari
            BPKAD untuk
            masyarakat</p>

        <div class="video-slide  sm:m-10 m-5 " data-aos="fade-up">
            <iframe style="height: 480px !important" src="https://www.youtube.com/embed/DwFg8kWMTVE"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            <iframe style="height: 480px !important" src="https://www.youtube.com/embed/doGpA_fipuM"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>

    </div>

    <div class="grid  grid-cols-1 md:h-[350px] h-min-[350px] relative overflow-hidden">
        <div class="relative">
            <div class="absolute bg-black/40 top-0 left-0 w-[100%] h-[350px]"></div>
            <img src="{{ asset('assets/local/aspirasi.jpg') }}" class="absolute z-[-1] object-cover h-[350px] w-full"/>

            <div class="absolute flex flex-col items-center justify-center  h-[350px] w-full" data-aos="fade-up">
                <p class="italic font-bold text-4xl text-white mb-3 text-center" data-aos="fade-up">Kirim Aspirasi Anda
                </p>
                <p class=" text-white text-center">Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik</p>
                <a href="https://ulas.surakarta.go.id/"
                   class="mt-3 relative   text-white font-bold border-white px-5 py-3 border-2 hover:bg-white/25">
                    Kirim Aspirasi
                </a>


            </div>
        </div>

    </div>


    <div class=" mt-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Artikel</p>
        <p class="text-sm text-center w-[50%] mx-auto" data-aos="fade-up">Artikel terbaru dari kami</p>

        <div class="flex justify-end items-center mr-16 mb-4">
            <a href="/artikel"
               class="flex justify-end items-center px-3 py-2 bg-primarylight text-sm font-bold shadow-md text-white hover:shadow-2xl transition duration-300 hover:scale-105">Lihat
                Semua Artikel <span class="material-symbols-outlined">
                    arrow_right_alt

                </span></a>

        </div>

        <div class="artikel-slide dark  sm:px-16 px-5 mb-10 " data-aos="fade-up" id="newArticle">

            <a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08"
               target="_blank"
               class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                         src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium"/>

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
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                         src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg"/>

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
                         src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg"/>

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">
                    Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka
                </p>
            </a>


            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                         src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg"/>

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
               href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"
               target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                         src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg"/>

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari
                    Solo,
                    Alat Berat Ikut Dikerahkan</p>

            </a>

        </div>
    </div>
@endsection
@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <script>
        function post_aspiration() {
            // let clas = $('#btn').attr('class');
            // if (!clas.includes('isDisabled')) {
            //     document.getElementById('form_aspiration').method = 'POST';
            //     document.getElementById('form_aspiration').submit();
            //     console.log('asdasd')
            //     $('#btn').addClass('isDisabled');
            // }

        }

        $('.slider-aplikasi').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 1500,
                settings: {
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
                {
                    breakpoint: 760,
                    settings: {
                        centerMode: true,
                        centerPadding: '20px',
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.video-slide').slick({
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    centerMode: false,
                    slidesToShow: 2
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

        function destroyCarousel() {
            if ($('.artikel-slide').hasClass('slick-initialized')) {
                $('.artikel-slide').slick('destroy');
            }
        }

        function articleSlick() {
            destroyCarousel();
            $('.artikel-slide').slick({

                centerPadding: '40px',
                slidesToShow: 4,
                focusOnSelect: 1,
                arrows: true,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        centerMode: false,
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 765,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                    {
                        breakpoint: 450,
                        settings: {
                            centerMode: false,
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }

        var imgArray = [
                '{{ asset('assets/local/slide.jpg') }}',
                '{{ asset('assets/local/slide2.jpg') }}',
            ],
            curIndex = 0;
        imgDuration = 5000;

        function slideShow() {
            document.getElementById('slider').classList.add("fadeOut");
            setTimeout(function () {
                document.getElementById('slider').src = imgArray[curIndex];
                document.getElementById('slider').classList.remove("fadeOut");
            }, 400);
            curIndex++;
            if (curIndex == imgArray.length) {
                curIndex = 0;
            }
            setTimeout(slideShow, imgDuration);
        }

        slideShow();
        // articleSlick()

        $(document).ready(function () {
            artikel()
            articleSlick()
        })

        function artikel() {
            let dataUrl = '{{ route('article.json', ['type' => 0]) }}'
            let newArticle = $('#newArticle');
            $('#btnLoadMore').addClass('cursor-not-allowed')
            $.ajax({
                type: 'GET',
                url: dataUrl,
                headers: {
                    'Accept': "application/json"
                },
                success: function (data, textStatus, xhr) {
                    if (data.length > 0) {
                        destroyCarousel()
                        newArticle.empty();
                        // newArticle[0].empty()
                        $.each(data, function (k, v) {
                            let url = v.type_article == 1 ? v.description : '/artikel/detail/' + v.slug;
                            let img = '';
                            let assetImg = '';
                            assetImg = '{{ asset('dataImage') }}';
                            if (v.cover) {
                                assetImg = assetImg.replace('/dataImage', v.cover)
                            } else {
                                assetImg = assetImg.replace('/dataImage',
                                    '/assets/local/logosurakarta.png')
                            }
                            newArticle.append('<a href="' + url + '"\n' +
                                '                target="_blank"\n' +
                                '                class="articleData mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="' + assetImg +
                                '" onerror="this.onerror=null;this.src=' + assetImg + '"/>\n' +
                                '\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">' +
                                v.title + '</p></div>\n' +
                                '            </a>')
                        })
                    }

                },

                complete: function (xhr, textStatus) {
                    articleSlick()
                },
                error: function (error, xhr, textStatus) {
                    console.log('error', error)
                }
            })
        }
    </script>
@endsection
