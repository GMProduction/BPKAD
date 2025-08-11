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
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a>
                <br>
                <a class="sm:font-bold text-white sm:text-md text-md font-light">Artikel terbaru dari kami</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/artikel.png') }}" alt="Background" />
    </div>

    <section class="py-12 px-4 sm:px-10 bg-white mt-16 mb-16">
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
        <div class="berita-lainnya" id="article-container">
            @foreach ($articles as $article)
                <a class="item" href="{{ route('article.detail', [$article->slug]) }}">
                    <img src="{{ asset($article->cover) }}" alt="{{ $article->title }}">
                    <div class="judul">
                        {{ $article->title }}
                    </div>
                </a>
            @endforeach
        </div>

        <div class="berita-lainnya__button text-center mt-4">
            <a href="javascript:void(0);" id="load-more" data-offset="{{ count($articles) }}"
                class="btn btn-outline-primary">
                Muat Lebih Banyak
            </a>
        </div>
    </section>
@endsection

@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


    <script>
        let skip = 0,
            isData = true,
            month = '',
            param = '';

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

        $(document).ready(function() {
            artikelHighLine();
            artikel()
        })


        $(document).on('click', '#btnLoadMore', function() {
            artikel()
        })

        function search(a) {
            let text = $(a).val();
            console.log(text.length)
            if (text.length > 2) {
                param = text
                skip = 0;
                artikel();
            } else if (text.length == 0) {
                param = '';
                skip = 0;
                artikel();
            }

        }

        function changeMonth(a) {
            skip = 0;
            month = $(a).val();
            artikel();
        }
    </script>

    <script>
        document.getElementById('load-more').addEventListener('click', function() {
            const button = this;
            const offset = button.getAttribute('data-offset');

            fetch(`{{ route('articles.load_more') }}?offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const container = document.getElementById('article-container');
                        data.forEach(article => {
                            const link = document.createElement('a');
                            link.className = 'item';
                            link.href = `/artikel/${article.slug}`;
                            link.innerHTML = `
                            <img src="/${article.cover}" alt="${article.title}">
                            <div class="judul">${article.title}</div>
                        `;
                            container.appendChild(link);
                        });

                        // Update offset
                        const newOffset = parseInt(offset) + data.length;
                        button.setAttribute('data-offset', newOffset);
                    } else {
                        button.innerText = 'Tidak ada artikel lagi';
                        button.disabled = true;
                    }
                });
        });
    </script>
@endsection
