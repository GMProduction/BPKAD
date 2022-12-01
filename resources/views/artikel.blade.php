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
         src="{{ asset('assets/local/gedung.jpg') }}"/>

    <div class=" ">

        <div
            class=" artikel-slide   relative bg-white md:m-16 my-6 mx-3 overflow-hidden transition duration-300 cursor-pointer hover:scale-105" id="newArticleHighLine">
            <div class="block overflow-hidden sm:h-[500px] h-[350px] relative rborder-gray-200 shadow animate-pulse dark:border-gray-700">
                <a href="#" class="absolute w-full h-full">
                    {{--                    <img class="absolute w-full h-full object-cover "--}}
                    {{--                         src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium"/>--}}
                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">
                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">

                            <a class="text-white text-sm mt-3 bg-gray-200 rounded-md w-[100px] h-5"></a>
                            <a class="text-white text-sm mt-3 bg-gray-200 rounded-md  h-5"></a>
                            <a class="text-white text-sm mt-3 bg-gray-200 rounded-md  h-5"></a>

                        </div>
                    </div>
                </a>
            </div>
        </div>


        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Artikel Terbaru</p>
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 sm:px-16 p-5 pb-0 " id="newArticle">
            @for($i = 1; $i <=8; $i++)
                <a role="status" class="loadFirst max-w-sm rounded border border-gray-200 shadow animate-pulse dark:border-gray-700  text-center">
                    <div class="flex justify-center items-center mb-4 h-48 bg-gray-300 rounded dark:bg-gray-700">
                        <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512">
                            <path
                                d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/>
                        </svg>
                    </div>
                    <div class="px-3 pb-3">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700  mb-4"></div>
                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                </a>
            @endfor
        </div>
        <div class="mb-5 sm:px-16 p-5 flex justify-center">
            <a id="btnLoadMore" role="button"
               class="cursor-not-allowed text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Load
                More</a>
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


    <script>
        let skip = 0, isData = true;

        function slick() {
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
        }

        $(document).ready(function () {
            artikelHighLine();
            artikel()
        })

        function artikel() {
            let dataUrl = '{{route('article.json',['type' => 0,'skip' => 'dataUrl'])}}'
            dataUrl = dataUrl.replace('dataUrl', skip);
            let newArticle = $('#newArticle');
            $('#btnLoadMore').addClass('cursor-not-allowed')
            $.ajax({
                type: 'GET',
                url: dataUrl,
                headers: {
                    'Accept': "application/json"
                },
                success: function (data, textStatus, xhr) {
                    $('#newArticle .loadDta').remove();
                    isData = false;

                    if (data.length > 0) {
                        if (skip == 0) {
                            newArticle.empty();
                        }
                        isData = true;

                        $.each(data, function (k, v) {
                            let url = v.type_article == 1 ? v.description : '/artikel/detail/' + v.slug;
                            let img = '';
                            let assetImg = '';
                            assetImg = '{{asset('dataImage')}}';
                            if (v.cover) {
                                assetImg = assetImg.replace('/dataImage', v.cover)
                            } else {
                                assetImg = assetImg.replace('/dataImage', '/assets/local/logosurakarta.png')
                            }
                            newArticle.append('<a href="' + url + '"\n' +
                                '                target="_blank"\n' +
                                '                class="articleData mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="' + assetImg + '" onerror="this.onerror=null;this.src=' + assetImg + '"/>\n' +
                                '\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">' + v.title + '</p></div>\n' +
                                '            </a>')
                        })
                    } else {
                        console.log('asdasd')
                        if (skip == 0 && $('.articleDataDefault').length == 0) {
                            $('.loadFirst').empty();
                            newArticle.append('<a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08"\n' +
                                '                target="_blank"\n' +
                                '                class="articleDataDefault mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium"/>\n' +
                                '\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">Wali Kota Surakarta @gibran_tweet sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat karena persoalan teknis.</p></div>\n' +
                                '            </a>\n' +
                                '<a href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"\n' +
                                '                target="_blank"\n' +
                                '                class="articleDataDefault mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg"/>\n' +
                                '\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan</p></div>\n' +
                                '            </a>\n' +
                                '<a href="https://solo.suaramerdeka.com/solo-raya/pr-055482435/kawasan-sriwedari-solo-dibersihkan-gerbang-sisi-utara-kembali-dibuka"\n' +
                                '                target="_blank"\n' +
                                '                class="articleDataDefault mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg"/>\n' +
                                '\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka</p></div>\n' +
                                '            </a>\n' +
                                '<a href="/"\n' +
                                '                target="_blank"\n' +
                                '                class="articleDataDefault mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">\n' +
                                '                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">\n' +
                                '                    <div class="absolute top-0 left-0 h-full w-full bg-black/40">\n' +
                                '                        <img class="w-full h-full object-cover rounded-md "\n' +
                                '                            src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg"/>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '                <div class="mb-3"><p class="italic font-bold text-md text-center px-3  line-clamp-3">Tari Gambyong: Gerakan, Pola Lantai, Properti, Iringan, dan Maknanya</p></div>\n' +
                                '            </a>'
                            )
                        }

                    }
                },
                beforeSend: function () {
                    if (isData && skip > 0) {
                        for (let i = 1; i <= 8; i++) {
                            newArticle.append('<a role="status" class="loadDta max-w-sm rounded border border-gray-200 shadow animate-pulse dark:border-gray-700  text-center">\n' +
                                '                    <div class="flex justify-center items-center mb-4 h-48 bg-gray-300 rounded dark:bg-gray-700">\n' +
                                '                        <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512">\n' +
                                '                            <path\n' +
                                '                                d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/>\n' +
                                '                        </svg>\n' +
                                '                    </div>\n' +
                                '                    <div class="px-3 pb-3">\n' +
                                '                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700  mb-4"></div>\n' +
                                '                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>\n' +
                                '                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>\n' +
                                '                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>\n' +
                                '                    </div>\n' +
                                '                </a>' +
                                '')
                        }
                    }
                },
                complete: function (xhr, textStatus) {
                    $('#btnLoadMore').removeClass('cursor-not-allowed')
                    console.log($('#newArticle .articleData'))
                    if ($('.loadFirst').length == 0) {
                        skip = $('#newArticle .articleData').length;
                    }

                },
                error: function (error, xhr, textStatus) {
                    console.log('error', error)
                }
            })
        }

        function artikelHighLine() {
            let dataUrl = '{{route('article.json',['type' => 1])}}'
            let newArticle = $('#newArticleHighLine');
            $('#btnLoadMore').addClass('cursor-not-allowed')
            $.ajax({
                type: 'GET',
                url: dataUrl,
                headers: {
                    'Accept': "application/json"
                },
                success: function (data, textStatus, xhr) {
                    if (data.length > 0) {
                        newArticle.empty();
                        $.each(data, function (k, v) {
                            let url = v.type_article == 1 ? v.description : '/artikel/detail/' + v.slug;
                            let img = '';
                            let assetImg = '';
                            assetImg = '{{asset('dataImage')}}';
                            if (v.cover) {
                                assetImg = assetImg.replace('/dataImage', v.cover)
                            } else {
                                assetImg = assetImg.replace('/dataImage', '/assets/local/logosurakarta.png')
                            }
                            moment.locale("id");
                            newArticle.append('<div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white " >\n' +
                                '                <a href="' + url + '" class="absolute w-full h-full" target="_blank">\n' +
                                '                    <img class="absolute w-full h-full object-cover "\n' +
                                '                          src="' + assetImg + '" onerror="this.onerror=null;this.src=' + assetImg + '"/>\n' +
                                '                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">\n' +
                                '                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">\n' +
                                '\n' +
                                '                            <a class=" text-white text-sm mt-3">' + moment(v.created_at).format('d MMMM YYYY') + '</a>\n' +
                                '\n' +
                                '                            <a class="font-bold text-white text-lg line-clamp-3">' + v.title + '</div>\n' +
                                '                    </div>\n' +
                                '                </a>\n' +
                                '            </div>')
                        })
                    }else{
                        newArticle.empty();
                        newArticle.append('<div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white " >\n' +
                            '                <a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08" class="absolute w-full h-full" target="_blank">\n' +
                            '                    <img class="absolute w-full h-full object-cover "\n' +
                            '                          src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium"/>\n' +
                            '                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">\n' +
                            '                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">\n' +
                            '\n' +
                            '                            <a class=" text-white text-sm mt-3">7 November 2022</a>\n' +
                            '\n' +
                            '                            <a class="font-bold text-white text-lg line-clamp-3">Wali Kota Surakarta @gibran_tweet sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat karena persoalan teknis.</div>\n' +
                            '                    </div>\n' +
                            '                </a>\n' +
                            '            </div>\n' +
                            '<div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white " >\n' +
                            '                <a href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928" class="absolute w-full h-full" target="_blank">\n' +
                            '                    <img class="absolute w-full h-full object-cover "\n' +
                            '                          src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg"/>\n' +
                            '                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">\n' +
                            '                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">\n' +
                            '\n' +
                            '                            <a class=" text-white text-sm mt-3">6 November 2022</a>\n' +
                            '\n' +
                            '                            <a class="font-bold text-white text-lg line-clamp-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari\n' +
                            '                    Solo,\n' +
                            '                    Alat Berat Ikut Dikerahkan</div>\n' +
                            '                    </div>\n' +
                            '                </a>\n' +
                            '            </div>\n' +
                            '<div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white " >\n' +
                            '                <a href="https://solo.suaramerdeka.com/solo-raya/pr-055482435/kawasan-sriwedari-solo-dibersihkan-gerbang-sisi-utara-kembali-dibuka" class="absolute w-full h-full" target="_blank">\n' +
                            '                    <img class="absolute w-full h-full object-cover "\n' +
                            '                          src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg"/>\n' +
                            '                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">\n' +
                            '                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">\n' +
                            '\n' +
                            '                            <a class=" text-white text-sm mt-3">6 November 2022</a>\n' +
                            '\n' +
                            '                            <a class="font-bold text-white text-lg line-clamp-3">Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka</div>\n' +
                            '                    </div>\n' +
                            '                </a>\n' +
                            '            </div>\n' +
                            '<div class="block overflow-hidden sm:h-[500px] h-[350px] relative rounded-md bg-white " >\n' +
                            '                <a href="" class="absolute w-full h-full" target="_blank">\n' +
                            '                    <img class="absolute w-full h-full object-cover "\n' +
                            '                          src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg"/>\n' +
                            '                    <div class=" sm:h-[500px] h-[350px] w-[100%] bg-gradient-to-t from-black/70   relative">\n' +
                            '                        <div class="absolute   z-1 opacity-100 w-[100%] p-5 flex flex-col-reverse h-full">\n' +
                            '\n' +
                            // '                            <a class=" text-white text-sm mt-3">' + moment(v.created_at).format('d MMMM YYYY') + '</a>\n' +
                            '\n' +
                            '                            <a class="font-bold text-white text-lg line-clamp-3">Tari Gambyong: Gerakan, Pola Lantai,\n' +
                            '                    Properti, Iringan,\n' +
                            '                    dan Maknanya</div>\n' +
                            '                    </div>\n' +
                            '                </a>\n' +
                            '            </div>'

                        )
                    }
                },
                complete: function (xhr, textStatus) {
                    slick()
                },
                error: function (error, xhr, textStatus) {
                    console.log('error', error)
                }
            })
        }

        $(document).on('click', '#btnLoadMore', function () {
            artikel()
        })
    </script>
@endsection
