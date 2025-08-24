@extends('admin.base')
@section('content')
    @php
        $navItems = [
            ['label' => 'Slider', 'route' => 'customize.slider', 'match' => 'admin/kustomisasi-slider'],
            ['label' => 'Sejarah', 'route' => 'customize.home', 'match' => 'admin/kustomisasi-sejarah'],
            ['label' => 'Profil', 'route' => 'customize.profile', 'match' => 'admin/kustomisasi-profil'],
            ['label' => 'Bidang', 'route' => 'customize.bidang', 'match' => 'admin/kustomisasi-bidang'],
            [
                'label' => 'Aplikasi Online',
                'route' => 'customize.aplikasi.online',
                'match' => 'admin/kustomisasi-aplikasi-online',
            ],
            [
                'label' => 'Kontak Profil',
                'route' => 'customize.contact.profile',
                'match' => 'admin/kustomisasi-kontak-profil',
            ],
            ['label' => 'Video Youtube', 'route' => 'customize.youtube', 'match' => 'admin/kustomisasi-video-youtube'],
            ['label' => 'Layanan', 'route' => 'customize.layanan', 'match' => 'admin/kustomisasi-layanan'],
            ['label' => 'Aduan', 'route' => 'customize.aduan', 'match' => 'admin/kustomisasi-aduan'],
            ['label' => 'Produk Hukum', 'route' => 'customize.produkhukum', 'match' => 'admin/kustomisasi-produkhukum'],
            ['label' => 'FAQ', 'route' => 'customize.faq', 'match' => 'admin/kustomisasi-faq'],
        ];
    @endphp

    <div class="">
        <div class="nav-customize">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}" class="item {{ Request::is($item['match']) ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
        @yield('content-customize')

    </div>
@endsection
