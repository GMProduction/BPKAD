@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/0 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="sm:font-bold text-white sm:text-md text-sm font-light">Artikel terbaru dari kami</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16">
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 sm:p-16 p-5 ">
            <a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08" target="_blank"
                class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Wali Kota Surakarta
                    @gibran_tweet
                    sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat karena
                    persoalan teknis.
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer"
                href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo,
                    Alat Berat Ikut Dikerahkan</p>

            </a>
            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer"
                href="https://solo.suaramerdeka.com/solo-raya/pr-055482435/kawasan-sriwedari-solo-dibersihkan-gerbang-sisi-utara-kembali-dibuka"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">
                    Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka
                </p>
            </a>


            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>
            </a>

        </div>
    </div>
@endsection
