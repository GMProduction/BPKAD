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

        .isDisabled {
            color: white;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <div class="slider-items">
        <div class="background-layer">
            <div class="slider-header">
                @foreach ($slider as $slide)
                    <img src="{{ asset($slide->image) }}" alt="slider image" />
                @endforeach
            </div>
        </div>
    </div>

    <img class="absolute z-[-2]" src="{{ asset('assets/local/ornament1.jpg') }}" />

    <div class="mt-[-70px]
                    min-h-[150px] w-[90%] mx-[auto] rounded-md bg-white shadow-md flex items-center "
        data-aos="fade-up">
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-[auto] mb-[auto] w-[100%] ">
            <div
                class="flex flex-col md:justify-center justify-center items-center  sm:mx-0 px-5 sm:my-0 my-1 sm:mt-0 mt-3 border-r text-center">
                <div class="flex flex-row items-center mb-2">
                    <span class="material-symbols-outlined font-bold  t-primary mr-2">
                        mail
                    </span>
                    <span class="t-primary font-bold italic">Email</span>
                </div>
                <div>
                    <p class="textEmailH"></p>
                </div>
            </div>

            <div
                class="flex  flex-col md:justify-center justify-start items-center  sm:mx-0 px-5 sm:my-0 my-1 sm:mt-0 mt-3 border-r text-center">
                <div class="flex flex-row items-center mb-2">
                    <span class="material-symbols-outlined font-bold  t-primary mr-2">
                        location_on
                    </span>
                    <span class="t-primary font-bold italic">Alamat</span>
                </div>

                <div>
                    <p class="textAddressH " style="text-align: center"></p>
                </div>
            </div>

            <div
                class="flex flex-col md:justify-center justify-start items-center  sm:mx-0 px-5 sm:my-0 my-1 sm:mt-0 mt-3 border-r text-center">
                <div class="flex flex-row items-center mb-2">
                    <span class="material-symbols-outlined font-bold  t-primary mr-2">
                        call
                    </span>
                    <span class="t-primary font-bold italic">Phone</span>
                </div>

                <div>
                    <p class="textPhoneH"></p>
                </div>
            </div>

            <div
                class="flex flex-col md:justify-center justify-start items-center  sm:mx-0 px-5 sm:my-0 my-1 sm:mt-0 mt-3 border-r text-center">
                <div class="flex flex-row items-center mb-2">
                    <span class="material-symbols-outlined font-bold  t-primary mr-2">
                        schedule
                    </span>
                    <span class="t-primary font-bold italic">Jam Kerja</span>
                </div>

                <div>
                    <p class="textOfficeHoursH" style="white-space: pre-wrap;"></p>
                </div>
            </div>
        </div>
    </div>


    <div class=" flex justify-center mt-16 mb-16">

        <p class="t-primary font-bold text-5xl  mb-3 " data-aos="fade-up">Berita Terkini</p>
    </div>

    <section class="py-12 px-4 sm:px-10 bg-white">
        {{-- Berita Utama --}}
        <div class="berita-utama">
            <div class="berita-utama__image">
                <img src="{{ asset($firstarticle->cover) }}" alt="berita utama">
            </div>
            <div class="berita-utama__content">
                <div>
                    <h2>{{ $firstarticle->title }}</h2>
                    <div class="article-content">
                        {!! $firstarticle->description !!}
                    </div>
                </div>
                <div class="berita-utama__button">
                    <a href="{{ route('article.detail', [$firstarticle->slug]) }}">Baca Selengkapnya</a>
                </div>
            </div>
        </div>


        {{-- Garis pemisah --}}
        <hr class="my-6 border-t border-gray-200">

        {{-- Daftar Berita Lainnya --}}
        <div class="berita-lainnya">
            @foreach ($articles as $article)
                <a class="item" href="{{ route('article.detail', [$article->slug]) }}">
                    <img src="{{ asset($article->cover) }}" alt="{{ $article->title }}">
                    <div class="judul">
                        {{ $article->title }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="berita-lainnya__button">
            <a href="/article">Lihat Berita yang Lain</a>
        </div>

    </section>

    <div class="video-section" style="background-image: url('{{ asset('assets/local/kota.png') }}');">
        <div class="video-overlay">
            <div class="video-container">
                <div class="video-text" data-aos="fade-right">
                    <h2>Video Terbaru</h2>
                    <p>
                        BPKAD Kota Surakarta menghadirkan video terbaru yang membahas berbagai hal menarik seputar
                        pengelolaan keuangan daerah, inovasi pelayanan, serta perkembangan terbaru dalam tata kelola
                        pemerintahan yang transparan dan akuntabel
                    </p>
                </div>

                <div class="video-embeds" data-aos="fade-left">
                    <div class="video-frame">
                        <iframe src="https://www.youtube.com/embed/DwFg8kWMTVE?si=q0ErLcCqDvR5cwE8" ...></iframe>
                    </div>
                    <div class="video-frame second">
                        <iframe src="https://www.youtube.com/embed/doGpA_fipuM?si=4ubw8YoDz4EH9ZrF" ...></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="aplikasi-online ">
        <p class="title" data-aos="fade-up">Aplikasi Online</p>

        <div class="grid-container">
            @forelse($application as $ap)
                <a href="{{ $ap->url }}" target="_blank" class="app-card"
                    style="background-image: url('{{ asset('assets/local/bg-onlineapps.png') }}');">
                    <div class="icon">
                        <img src="{{ asset($ap->image) }}" alt="{{ $ap->name }}">
                    </div>
                    <div class="content">
                        <p class="app-title">{{ $ap->name }}</p>
                        <p class="short-desc">{{ $ap->short_description }}</p>
                        <p class="long-desc">{{ $ap->description }}</p>
                    </div>
                </a>
            @empty
                <p class="text-center ">Tidak ada aplikasi online</p>
        </div>
        @endforelse
    </div>


    <div class="aspirasi-section">
        <div class="aspirasi-left" data-aos="fade-up">
            <img class="background" src="{{ asset('assets/local/bg-aspirasi.png') }}" alt="Aspirasi Image" />
            <div class="card">
                <h3>Kirim Aspirasi Anda</h3>
                <p>Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik</p>
                <a href="https://ulas.surakarta.go.id/" target="_blank">Kirim Aspirasi</a>
            </div>
            <div class="card second">
                <h3>Kirim Laporan<br>Pengaduan Online</h3>
                <p>Sampaikan Laporan langsung kepada instansi pemerintah berwenang</p>
                <a href="https://www.lapor.go.id/" target="_blank">SP4N LAPOR</a>
            </div>
        </div>
        <div class="aspirasi-right" data-aos="fade-left">
            <img src="{{ asset('assets/local/aspirasi_pic.png') }}" alt="Aspirasi Image">
        </div>
    </div>
@endsection
@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <script>
        $('.slider-header').slick({
            autoplay: true,
            autoplayspeed: 500,
            fade: true,

        });

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

        function videoSlick() {
            if ($('.video-slide').hasClass('slick-initialized')) {
                $('.video-slide').slick('destroy');
            }
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
        }

        var imgArray = [];
        var curIndex = 0;
        var imgDuration = 1000;


        $(document).ready(function() {
            getYoutubeVideo()
            contact()
        })

        function getYoutubeVideo() {
            fetch('{{ route('youtube.video.json') }}')
                .then((response) => response.json())
                .then(data => {
                    $('#ytVideo').empty();
                    $.each(data, function(k, v) {
                        $('#ytVideo').append(v.url)
                    })
                    videoSlick()
                })
        }

        function contact() {
            fetch('{{ route('contact.profile.json') }}')
                .then((response) => response.json())
                .then((data) => {
                    document.querySelector('.textEmailH').innerHTML = data?.email
                    document.querySelector('.textAddressH').innerHTML = data?.address
                    document.querySelector('.textOfficeHoursH').innerHTML = data?.office_hours
                    document.querySelector('.textPhoneH').innerHTML = data?.phone
                })
        }

        document.querySelectorAll('.berita-utama__content p').forEach(p => {
            const children = Array.from(p.childNodes);

            const onlyAllowed = children.every(child => {
                return (
                    (child.nodeType === 1 && (child.tagName === 'IMG' || child.tagName === 'BR')) ||
                    // <img> atau <br>
                    (child.nodeType === 3 && child.textContent.trim() === '') // text node kosong
                );
            });

            if (onlyAllowed) {
                p.style.display = 'none';
            }
        });
    </script>
@endsection
