@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">SURVEY KEPUASAN MASYARAKAT</a> <br>
                <a class="font-bold text-white">Survey Kepuasan Masyarakat bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/layanan.png') }}" alt="Background" />
    </div>


    <section class="visi-misi-section">
        <x-panel-content title="Survey Kepuasan Masyarakat" cardStyle="margin-bottom: 10px; margin-top: 50px;">
            <p class="text-md   mx-auto">
                @foreach ($data as $item)
                    <p style="font-size: 2rem; font-weight: bold"> Tahun {{ $item->year }}</p>
                    <div class="grid grid-cols-2 sm:grid-cols-4  gap-6 mb-5">
                        @for ($i = 1; $i <= 4; $i++)
                            @php
                                $quarterField = 'quarter_' . $i; // contoh: quarter_1, quarter_2, dst
                                $triwulanText = 'Triwulan ' . $i;
                            @endphp

                            @if ($item->$quarterField)
                                <a class="bg-white shadow rounded-lg overflow-hidden block " style="text-decoration: none"
                                    href="{{ $item->$quarterField }}" target="_blank">
                                    {{-- Gambar --}}
                                    <img src="{{ $item->$quarterField }}" alt="Gambar {{ $item->$quarterField }}"
                                        class="w-full h-62 object-cover">

                                    <div class="p-2">
                                        <p class="text-gray-600 flex justify-center items-center font-bold mb-0">
                                            {{ $triwulanText }}
                                        </p>
                                    </div>
                                </a>
                            @else
                                <a class="bg-white shadow rounded-lg overflow-hidden block no-underline"
                                    style="text-decoration: none"
                                    href="https://appbagor.surakarta.go.id/sop/skm/instrumen/isi/62" target="_blank">
                                    {{-- Gambar --}}
                                    <img src="{{ asset('assets/local/no_survey.png') }}"
                                        alt="Gambar {{ $item->$quarterField }}" class="w-full h-62 object-cover">

                                    <div class="p-2">
                                        <p class="text-gray-600 flex justify-center items-center font-bold mb-0">
                                            {{ $triwulanText }}
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endfor




                    </div>
                @endforeach
            </p>
        </x-panel-content>



        <x-panel-content title="Survey Kepuasan Masyarakat" cardStyle="margin-bottom: 50px; margin-top: 50px;">
            <p class="text-md   mx-auto">
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

            <div style="margin-top: 50px;"><a href="https://appbagor.surakarta.go.id/sop/skm/instrumen/isi/62"
                    target="_blank" class=" py-2 px-5 text-white text-bold mt-10 "
                    style="background-color: rgb(25, 48, 253); text-decoration: none; border-radius: 10px">Isi
                    Survey
                    disini</a></div>


            </div>
            </p>
        </x-panel-content>




    </section>
@endsection

@section('morejs')
    <script></script>
@endsection
