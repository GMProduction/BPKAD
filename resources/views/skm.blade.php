@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">SURVEY KEPUASAN MASYARAKAT</a> <br>
                <a class="font-bold text-white">Survey Kepuasan Masyarakat bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/gedung.jpg') }}" alt="Background" />
    </div>


    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi first">
                        <div class="card-header">Standar Pelayanan</div>
                        <div class="card-body">
                            <div class="">
                                <p class="text-primary font-bold text-3xl italic  text-center mb-10">Tabel Hasil Survey
                                    Kepuasan Masyarakat</p>
                                <div class="relative ">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Tahun
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Triwulan I
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Triwulan II
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Triwulan III
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Triwulan IV
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $d)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $d->year }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        @if ($d->quarter_1)
                                                            <a role="button" href="{{ $d->quarter_1 }}" target="_blank"
                                                                class="button-link">Lihat</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @if ($d->quarter_2)
                                                            <a role="button" href="{{ $d->quarter_2 }}" target="_blank"
                                                                class="button-link">Lihat</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @if ($d->quarter_3)
                                                            <a role="button" href="{{ $d->quarter_3 }}" target="_blank"
                                                                class="button-link">Lihat</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @if ($d->quarter_4)
                                                            <a role="button" href="{{ $d->quarter_4 }}" target="_blank"
                                                                class="button-link">Lihat</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" colspan="5"
                                                        class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Data tidak tersedia
                                                    </th>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <div>
                                        {{-- href="https://appbagor.surakarta.go.id/sop/skm/instrumen/isi/62" target="_blank" --}}
                                        <p class="mt-10 text-justify">Tingkatkan kualitas layanan publik dengan berbagi
                                            pendapat Anda!
                                            Partisipasi Anda

                                            dalam survei kepuasan masyarakat adalah langkah penting menuju perubahan yang
                                            positif. Setiap
                                            tanggapan Anda membantu kami memahami kebutuhan dan harapan masyarakat, sehingga
                                            kami dapat
                                            meningkatkan kinerja dan efisiensi layanan kami.

                                            Dengan mengisi survei ini, Anda tidak hanya memberikan umpan balik yang
                                            berharga, tetapi juga
                                            berkontribusi pada pembangunan komunitas yang lebih baik. Kami percaya bahwa
                                            setiap suara memiliki
                                            dampak, dan kami berkomitmen untuk mendengarkan dan merespons setiap pendapat
                                            dengan cermat.

                                            Jadi, jangan ragu untuk berbagi pengalaman Anda dengan kami. Bersama-sama, kita
                                            dapat menciptakan
                                            lingkungan yang lebih baik dan membangun masa depan yang lebih cerah untuk semua
                                            orang. Terima kasih
                                            atas partisipasi Anda!</p>



                                    </div>
                                    <div style="margin-top: 50px;"><a
                                            href="https://appbagor.surakarta.go.id/sop/skm/instrumen/isi/62" target="_blank"
                                            class=" py-5 px-10 text-white text-bold mt-10 "
                                            style="background-color: orange">Isi
                                            Survey
                                            disini</a></div>

                                </div>

                                {{-- <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <iframe style="height: 80vh"
                        src="https://drive.google.com/file/d/1her3udg4UWNYdpi3aNeZWli4QSy9EaGx/preview"
                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                </a>
            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('morejs')
    <script></script>
@endsection
