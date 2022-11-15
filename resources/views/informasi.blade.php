@extends('base')

@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')


    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-primary  text-4xl mb-3 inline-block mr-3">INFORMASI </a> <a
                class="font-bold text-4xl text-white inline-block ">BPKAD</a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Bidang Aset dipimpin oleh
                seorang Kepala Bidang yang berkedudukan dibawah dan bertanggung jawab kepada Kepala Badan melalui
                Sekretaris</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
        src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">
        <div class="bg-white p-10  w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic mb-3 text-center">Judul Informasi</p>
            <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th class="text-center" data-priority="1">No</th>
                        <th class="text-left" data-priority="1">Nama Dokumen</th>
                        <th class="text-center" data-priority="2">Download Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td class="text-sm text-center" class="ai-save">1</td>
                        <td class="text-sm">SK Daftar Informasi Yang Dikecualikan</td>
                        <td class="text-center"><button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">Download</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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
@endsection
