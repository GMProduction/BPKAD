@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">SK Pengelola Aduan</a> <br>
                <a class="font-bold text-white">SK Pengelola Aduan bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/aduan.png') }}" alt="Background" />
    </div>

    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="container">
            <div class="visi-misi-wrapper">

                <!-- Kiri: Kartu Visi & Misi -->
                <div class="visi-misi-cards">

                    <!-- Card Visi -->
                    <div class="card-visimisi ">
                        <div class="card-header">SK Pengelola Aduan</div>
                        <div class="card-body">
                            <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Tahun
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Download Link
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
                                                        class="button-link">Download</a>
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
                        </div>
                    </div>
                </div>
    </section>
@endsection

@section('morejs')
    <script></script>
@endsection
