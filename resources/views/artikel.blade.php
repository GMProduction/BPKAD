@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/50 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-primary  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="sm:font-bold text-white sm:text-md text-sm font-light">Artikel terbaru dari kami</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16">


        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 sm:p-16 p-5 ">
            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://cdn-2.tstatic.net/jateng/foto/bank/images/kericuhan-di-rutan-solo-kamis-1012019.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Pemerintah Kota Surakarta Meraih Opini WTP
                    ke-12 Secara
                    berturut
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/Wz555Tw9E7BzYVE3_UgSwYYk4KM=/0x0:780x520/750x500/data/photo/2019/09/16/5d7f65d83d0b9.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Perbedaan Solo, Surakarta, Kartasura, dan
                    Solo Baru,
                    Ini Sejarahnya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/3lNrjcur7miM2mLmWyfwUlC5Oq0=/0x0:0x0/750x500/data/photo/2021/10/11/6164296e46e4f.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Mengenal Bedhaya Ketawang, Tarian Sakral dari
                    Keraton
                    Surakarta
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://cdn-2.tstatic.net/jateng/foto/bank/images/kericuhan-di-rutan-solo-kamis-1012019.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Pemerintah Kota Surakarta Meraih Opini WTP
                    ke-12 Secara
                    berturut
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/Wz555Tw9E7BzYVE3_UgSwYYk4KM=/0x0:780x520/750x500/data/photo/2019/09/16/5d7f65d83d0b9.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Perbedaan Solo, Surakarta, Kartasura, dan
                    Solo Baru,
                    Ini Sejarahnya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/50"></div>
                    <img class="w-full h-full object-cover rounded-md hover:scale-50"
                        src="https://asset.kompas.com/crops/3lNrjcur7miM2mLmWyfwUlC5Oq0=/0x0:0x0/750x500/data/photo/2021/10/11/6164296e46e4f.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Mengenal Bedhaya Ketawang, Tarian Sakral dari
                    Keraton
                    Surakarta
                </p>
            </a>

        </div>
    </div>
@endsection
