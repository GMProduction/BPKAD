@extends('base')

@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <x-page-header>
        <a class="font-bold text-white  text-4xl mb-3 inline-block mr-3">INFORMASI SETIAP SAAT</a> <br>
        <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-sm font-light">Informasi Setiap Saat
            adalah informasi yang harus disediakan oleh Badan Publik dan siap tersedia untuk dapat langsung diberikan
            kepada Pemohon Informasi Publik ketika terdapat permohonan terhadap Informasi Publik tersebut.</a>
    </x-page-header>

    <x-panel-content title="Informasi Setiap saat" cardStyle="margin-bottom: 10px; margin-top: 50px;">
        <div class="bg-white p-10  w-[95%] mx-auto shadow-md mb-6">
            <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th class="text-center" data-priority="1">No</th>
                        <th class="text-left" data-priority="1">Dokumen</th>
                        @foreach ($arr_year as $year)
                            <th class="text-center">{{ $year }}</th>
                        @endforeach
                        {{--                    <th class="text-center" data-priority="2">Link/Download</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $v)
                        <tr>
                            <td class="text-sm text-center ai-save">{{ $loop->index + 1 }}</td>
                            <td class="text-sm">{{ $v['name'] }}</td>
                            @foreach ($v['year'] as $year)
                                <td class="text-sm text-center">
                                    @if ($year['type'] === 0)
                                        <a class="block text-center text-blue-600" href="{{ $year['document'] }}">Link</a>
                                    @elseif($year['type'] === 1)
                                        <a class="block text-center text-blue-600"
                                            href="{{ $year['document'] }}">Document</a>
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </x-panel-content>
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
