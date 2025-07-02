@extends('base')

@section('content')
    <x-page-header>
        <a class="font-bold text-primary  text-4xl mb-3 inline-block mr-3">Informasi </a> <a
            class="font-bold text-4xl text-white inline-block ">Berkala</a> <br>
        <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Informasi yang wajib
            diperbaharui kemudian disediakan dan diumumkan kepada publik secara berkala sekurang-kurangnya setiap 6
            bulan sekali.</a>
    </x-page-header>


    <div class=" mt-16 mb-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center">Informasi Berkala</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[80%] w-[95%] mx-auto">Informasi yang wajib di perbaharui
            kemudian disediakan dan
            diumumkan kepada
            publik secara berkala sekurang-kurangnya setiap 6 bulan sekali</p>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 sm:m-10 m-5">
            @foreach ($data as $v)
                <div class="h-[75px] hover:shadow-xl border hover:border-none bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer panel-category"
                    data-slug="{{ $v->slug }}">

                    <span class="material-symbols-outlined font-bold  text-primary mr-2">
                        @if ($v->name == 'Ringkasan Program dan Kegiatan yang sedang dijalankan')
                            history_edu
                        @elseif ($v->name == 'Ringkasan Laporan Keuangan')
                            request_quote
                        @elseif ($v->name == 'Ringkasan Laporan Keuangan')
                            request_quote
                        @elseif ($v->name == 'Informasi Pengadaan Barang dan Jasa')
                            inventory_2
                        @elseif ($v->name == 'Informasi tentang Peraturan, Keputusan, atau Kebijakan yang Mengikat')
                            local_police
                        @elseif ($v->name == 'Ringkasan Informasi tentang Kinerja')
                            work
                        @elseif ($v->name == 'Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran')
                            dangerous
                        @elseif ($v->name == 'Informasi tentang Prosedur Peringatan Dini dan Prosedur Evakuasi Keadaan Darurat')
                            warning
                        @else
                            info
                        @endif


                    </span>


                    <span class="font-bold">{{ $v->name }}</span>
                </div>
            @endforeach



            {{--            <div --}}
            {{--                class="h-[75px] hover:shadow-xl border hover:border-none bg-white  transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer"> --}}
            {{--                <span class="material-symbols-outlined font-bold  text-primary mr-2"> --}}
            {{--                    work --}}
            {{--                </span> --}}
            {{--                <span class="font-bold">Ringkasan Informasi Tentang Kinerja</span> --}}
            {{--            </div> --}}

            {{--            <div --}}
            {{--                class="h-[75px] hover:shadow-xl border hover:border-none  bg-white transitiom ease-in-out duration-300 rounded-md flex items-center p-5 cursor-pointer"> --}}
            {{--                <span class="material-symbols-outlined font-bold  text-primary mr-2"> --}}
            {{--                    dangerous --}}
            {{--                </span> --}}
            {{--                <span class="font-bold">Informasi Tentang Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran</span> --}}
            {{--            </div> --}}


        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.panel-category').on('click', function(e) {
                let slug = this.dataset.slug;
                window.location.href = '/informasi-berkala/' + slug;
            })
        });
    </script>
@endsection
