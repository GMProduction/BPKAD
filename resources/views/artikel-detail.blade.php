@extends('base')

@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <x-page-header>
        <a class="font-bold text-white  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
        <a class="sm:font-bold text-white sm:text-md text-md font-light">Artikel terbaru dari kami</a>
    </x-page-header>

    <div class="article-detail-page">
        <div class="article-container">



            <!-- Konten Kiri: Artikel -->
            <div class="article-main">
                @if ($article)
                    <div class="article-share">
                        <button class="share-btn" onclick="shareArticle()">
                            <span class="material-symbols-outlined">share</span>
                            Bagikan
                        </button>
                    </div>
                    <h1 class="article-title">{{ $article->title }}</h1>
                    <p class="article-date">{{ date_format(date_create($article->date), 'd F Y') }}</p>

                    <div class="article-cover">
                        <img src="{{ asset($article->cover ?? '/assets/local/logosurakarta.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('/assets/local/logosurakarta.png') }}'"
                            alt="Article Cover" />
                    </div>

                    <div class="article-description">
                        {!! $article->description !!}
                    </div>
                @endif
            </div>

            <!-- Konten Kanan: Berita Lainnya -->
            <div class="article-sidebar">
                <h2>Berita Lainnya</h2>
                <ul>
                    @foreach ($articles as $item)
                        <li>
                            <a href="{{ route('article.detail', $item->slug) }}">
                                <img src="{{ asset($item->cover ?? '/assets/local/logosurakarta.png') }}" alt="Thumbnail">
                                <p title="{{ $item->title }}">{{ $item->title }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>

    <script>
        function shareArticle() {
            const url = window.location.href;
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: url
                });
            } else {
                // fallback copy link
                navigator.clipboard.writeText(url);
                alert("Link artikel sudah disalin!");
            }
        }
    </script>
@endsection
