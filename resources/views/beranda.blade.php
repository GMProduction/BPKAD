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
    <div class="mt-[-89px] sm:h-[796px] h-[350px] w-[100%] bg-black/30 z-[-1]  relative">
        <div class="absolute sm:bottom-[200px] bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white text-4xl" data-aos="fade-left">BPKAD </a> <a class="font-bold text-4xl text-white"
                data-aos="fade-left">KOTA
                SURAKARTA</a> <br>
            <a class="font-bold text-white " data-aos="fade-right">Badan Pengelolaan Keuangan & Aset Daerah Kota
                Surakarta</a>
        </div>
    </div>

    <img id="slider" src="{{ asset('assets/local/slide.jpg') }}"
        class="absolute z-[-2] w-[100%] sm:h-[796px] h-[350px] object-cover top-0 left-0" />


    <div class="mt-[-70px] min-h-[150px] w-[90%] mx-[auto] rounded-md bg-white shadow-md flex items-center "
        data-aos="fade-up">
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-4 mt-[auto] mb-[auto] w-[100%]">
            <div class="flex  md:justify-center justify-start  sm:mx-0 mx-5 sm:my-0 my-1 sm:mt-0 mt-3">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    mail
                </span>
                <div>
                    <p class="text-primary font-bold italic">Email</p>
                    <p>bpkad@surakarta.go.id</p>
                </div>
            </div>

            <div class="flex  md:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    location_on
                </span>
                <div>
                    <p class="text-primary font-bold italic">Alamat</p>
                    <p>Jl. Jend Sudirman No. 2 ,
                        Kompleks Balaikota Surakarta</p>
                </div>
            </div>

            <div class="flex  jmd:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1">
                <span class="material-symbols-outlined font-bold  text-primary mr-2">
                    call
                </span>
                <div>
                    <p class="text-primary font-bold italic">Phone</p>
                    <p>(0271) 648089</p>
                </div>
            </div>

            <div class="flex  md:justify-center justify-start sm:mx-0 mx-5 sm:my-0 my-1 sm:mb-0 mb-3">
                <span class="material-symbols-outlined font-bold  text-primary mr-2 ">
                    schedule
                </span>
                <div>
                    <p class="text-primary font-bold italic">Jam Kerja</p>
                    <p>Senin-Kamis 07.15-16.00 WIB</p>
                    <p>Jumat 07.00-11.30 WIB</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container grid sm:grid-cols-8 grid-cols-1 gap-4 mt-16 mb-6">

        <div class="col-span-1">
            {{-- <img src="{{ asset('assets/local/mantab_no_korupsi.png') }}" class="w-[40%] m-auto" /> --}}
        </div>



        <div class="col-span-5 sm:mx-0 mx-5">
            <p class="text-primary font-bold text-3xl italic mb-3 " data-aos="fade-up">Tentang BPKAD Surakarta?</p>
            <p class="text-sm" data-aos="fade-up">Badan Pengelolaan Keuangan dan Aset Daerah Kota Surakarta merupakan unsur
                pelaksana
                fungsi penunjang urusan Pemerintahan Bidang Keuangan, Sub Pengelolaan Keuangan dan Aset Daerah yang
                menjadi kewenangan Pemerintahan Daerah yang dipimpin oleh Kepala Badan Pengelolaan Keuangan dan Aset
                Daerah sesuai dengan Peraturan Walikota Surakarta Nomor 41 tahun 2021 Tentang Kedudukan, Susunan
                Organisasi, Tugas dan Fungsi serta Tata Kerja Badan Daerah</p>
        </div>
    </div>

    <div class="bg-primary mt-16 w-[100%] py-10 sm:px-10 px-5">
        <p class="text-white font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Aplikasi Online</p>
        <p class="text-white/80 text-sm text-center mb-10" data-aos="fade-up">Aplikasi Online yang dapat membantumu</p>

        <div class="slider-aplikasi" data-aos="fade-up">
            <a class="block " href="https://surakartakota.fmis.id//" target="_blank">
                <div
                    class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                    <div>
                        <img src="{{ asset('assets/local/simdang.png') }}"
                            class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5" />
                    </div>
                    <div class="col-span-2">
                        <p class="text-white font-bold text-2xl italic mb-3">APLIKASI FMIS</p>
                        <p class="text-sm text-white/80 ">Financial Management Information System (FMIS) dikembangkan dari
                            basis SIMDA untuk mempermudah manajemen keuangan daerah pada Pemerintah Kota Surakarta.</p>
                    </div>

                </div>
            </a>
            <a class="block " href="https://hibah.surakarta.go.id/" target="_blank">
                <div
                    class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                    <div>
                        <img src="{{ asset('assets/local/hibah-online.png') }}"
                            class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5" />
                    </div>
                    <div class="col-span-2">
                        <p class="text-white font-bold text-2xl italic mb-3">APLIKASI HIBAH ONLINE</p>
                        <p class="text-sm text-white/80 ">Aplikasi Hibah Bansos dan Bankeu
                            Pemerintah Surakarta, Jawa Tengah
                            Badan Pendapatan Pengelolaan Keuangan dan Aset Daerah</p>
                    </div>

                </div>
            </a>
            <a class="block " href="https://bppkad.surakarta.go.id/sinta/" target="_blank">
                <div
                    class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                    <div>
                        <img src="{{ asset('assets/local/sinta.png') }}" class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5" />
                    </div>
                    <div class="col-span-2">
                        <p class="text-white font-bold text-2xl italic mb-3">APLIKASI SINTA</p>
                        <p class="text-sm text-white/80 ">Sistem Informasi Tanah Pemerintah Kota Surakarta</p>
                    </div>

                </div>
            </a>
            <a class="block " href="https://bppkad.surakarta.go.id/sikendis/" target="_blank">
                <div
                    class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                    <div>
                        <img src="{{ asset('assets/local/sikendis.png') }}"
                            class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5" />
                    </div>
                    <div class="col-span-2">
                        <p class="text-white font-bold text-2xl italic mb-3">APLIKASI SIKENDIS</p>
                        <p class="text-sm text-white/80 ">Sistem Informasi Kendaraan Dinas
                            Pemerintah Kota Surakarta</p>
                    </div>

                </div>
            </a>

            <a class="block " href="https://bppkad.surakarta.go.id/sikendis/" target="_blank">
                <div
                    class="rounded-md w-[100%] bg-white/25 hover:bg-white/50 grid grid-cols-1 sm:grid-cols-3 p-5 transition duration-150 cursor-pointer h-[300px] sm:h-[250px]">
                    <div>
                        <img src="{{ asset('assets/local/siperon.png') }}"
                            class="w-[100px] m-auto sm:w-[80%] sm:mb-0 mb-5" />
                    </div>
                    <div class="col-span-2">
                        <p class="text-white font-bold text-2xl italic mb-3">APLIKASI SIPERON<i
                                class="mdi mdi-skip-previous-outline:"></i></p>
                        <p class="text-sm text-white/80 ">Sistem Informasi Persediaan Online.</p>
                    </div>

                </div>
            </a>



        </div>

    </div>

    <div class=" mt-16 mb-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Video Terbaru</p>
        <p class="text-sm text-center md:w-[50%] sm:w-[80%] w-[95%] mx-auto" data-aos="fade-up">Video dari BPKAD untuk
            masyarakat</p>

        <div class="video-slide dark sm:m-10 m-5 " data-aos="fade-up">
            <iframe style="height: 480px !important" src="https://www.youtube.com/embed/DwFg8kWMTVE"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>

            <iframe style="height: 480px !important" src="https://www.youtube.com/embed/doGpA_fipuM"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

    </div>

    <div class="grid md:grid-cols-2 grid-cols-1 md:h-[750px] h-min-[750px] relative overflow-hidden">
        <div class="relative">
            <div class="absolute bg-black/40 top-0 left-0 w-[100%] h-[100%]"></div>
            <img src="{{ asset('assets/local/aspirasi.jpg') }}" class="absolute z-[-1] object-cover h-full" />

            <div class="absolute bottom-16 left-10 " data-aos="fade-up">
                <p class="italic font-bold text-4xl text-white mb-3" data-aos="fade-up">Kirim Aspirasi Anda</p>
                <p class=" text-white">Yuk, Masukan aspirasimu untuk BPKAD yang lebih baik</p>
            </div>
        </div>
        <div class="bg-primary sm:p-16 p-5 py-10 sm:py-16">
            <div class="block md:hidden">
                <p class="italic font-bold sm:text-4xl text-2xl text-white mb-3" data-aos="fade-up">Kirim Aspirasi Anda
                </p>
                <p class=" text-white/80 sm:text-md text-sm mb-6" data-aos="fade-up">Yuk, Masukan aspirasimu untuk BPKAD
                    yang lebih baik
                </p>
            </div>
            <form>
                <div class="mb-6" data-aos="fade-up">
                    <label for="aspirasi-nama" class="block mb-2 text-sm font-medium text-white ">Nama</label>
                    <input type="text" id="aspirasi-nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Nama Anda" required>
                </div>

                <div class="mb-6" data-aos="fade-up">
                    <label for="aspirasi-alamat" class="block mb-2 text-sm font-medium text-white ">Alamat</label>
                    <input type="text" id="aspirasi-alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Alamat Anda" required>
                </div>

                <div class="mb-6" data-aos="fade-up">
                    <label for="aspirasi-nohp" class="block mb-2 text-sm font-medium text-white ">Email</label>
                    <input type="text" id="aspirasi-nohp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Email Anda" required>
                </div>

                <div class="mb-6" data-aos="fade-up">
                    <label for="aspirasi-text" class="block mb-2 text-sm font-medium text-white ">Masukan
                        Aspirasi</label>
                    <textarea type="text" id="aspirasi-text" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 "
                        placeholder="Masukan Aspirasi anda" required></textarea>
                </div>

                <div class="mb-6" data-aos="fade-up">
                    <label class="block mb-2 text-sm font-medium text-white" for="user_avatar">Upload file</label>
                    <input
                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <div class="mt-1 text-sm text-white" id="user_avatar_help">Masukan Gambar / Foto jika diperlukan
                    </div>
                </div>

                <button type="submit" data-aos="fade-up"
                    class="text-white bg-teal-500 hover:bg-teal-600 transition duration-300 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg w-full h-[75px] px-5 py-2.5 text-center  font-bold text-2xl">Kirim</button>
            </form>
        </div>
    </div>


    <div class=" mt-16">

        <p class="text-primary font-bold text-3xl italic mb-3 text-center" data-aos="fade-up">Artikel</p>
        <p class="text-sm text-center w-[50%] mx-auto" data-aos="fade-up">Artikel terbaru dari kami</p>

        <div class="flex justify-end items-center mr-16 mb-4">
            <a href="/artikel"
                class="flex justify-end items-center px-3 py-2 bg-primarylight text-sm font-bold shadow-md text-white hover:shadow-2xl transition duration-300 hover:scale-105">Lihat
                Semua Artikel <span class="material-symbols-outlined">
                    arrow_right_alt

                </span></a>

        </div>

        <div class="artikel-slide dark  sm:px-16 px-5 " data-aos="fade-up">

            <a href="https://twitter.com/RADARSOLO_/status/1589464155827757056?t=KidA4z7az-0QBY80B5SZaQ&s=08"
                target="_blank"
                class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://pbs.twimg.com/media/Fg7jMG9UoAEQMrL?format=jpg&name=medium" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Wali Kota Surakarta
                    @gibran_tweet
                    sempat mengatakan, penataan Taman Balekambang sempat mengalami keterlambatan selama beberapa saat
                    karena
                    persoalan teknis.
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
                href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari
                    Solo,
                    Alat Berat Ikut Dikerahkan</p>

            </a>
            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
                href="https://solo.suaramerdeka.com/solo-raya/pr-055482435/kawasan-sriwedari-solo-dibersihkan-gerbang-sisi-utara-kembali-dibuka"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/11/06/39043295.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">
                    Kawasan Sriwedari Solo Dibersihkan, Gerbang Sisi Utara Kembali Dibuka
                </p>
            </a>


            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://asset.kompas.com/crops/hI7t9Rp4KUaZO7eJ8xgckwN6KDQ=/0x0:1000x667/750x500/data/photo/2022/02/24/6217365e120c5.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">Tari Gambyong: Gerakan, Pola Lantai,
                    Properti, Iringan,
                    dan Maknanya
                </p>
            </a>

            <a class="mb-10 block hover:shadow-xl hover:bg-white transition duration-300 cursor-pointer hover:scale-105"
                href="https://www.solopos.com/1-500-orang-bersih-bersih-kawasan-sriwedari-solo-alat-berat-ikut-dikerahkan-1464928"
                target="_blank">
                <div class="h-[300px] rounded-md relative overflow-hidden mb-5">
                    <div class="absolute top-0 left-0 h-full w-full bg-black/40"></div>
                    <img class="w-full h-full object-cover rounded-md "
                        src="https://images.solopos.com/2022/11/bersih-bersih-sriwdari.jpg" />

                </div>
                <p class="italic font-bold text-md text-center px-3 pb-3">1.500 Orang Bersih-Bersih Kawasan Sriwedari
                    Solo,
                    Alat Berat Ikut Dikerahkan</p>

            </a>

        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/import/slick-1.8.1/slick/slick.min.js') }} "></script>

    <script>
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

        $('.video-slide').slick({
            centerMode: true,
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

        $('.artikel-slide').slick({

            centerPadding: '40px',
            slidesToShow: 4,
            focusOnSelect: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        centerMode: false,
                        slidesToShow: 3
                    }
                }, , {
                    breakpoint: 765,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

        var imgArray = [
                '{{ asset('assets/local/slide.jpg') }}',
                '{{ asset('assets/local/slide2.jpg') }}',
            ],
            curIndex = 0;
        imgDuration = 5000;

        function slideShow() {
            document.getElementById('slider').classList.add("fadeOut");
            setTimeout(function() {
                document.getElementById('slider').src = imgArray[curIndex];
                document.getElementById('slider').classList.remove("fadeOut");
            }, 400);
            curIndex++;
            if (curIndex == imgArray.length) {
                curIndex = 0;
            }
            setTimeout(slideShow, imgDuration);
        }
        slideShow();
    </script>
@endsection
