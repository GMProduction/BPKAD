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
            <a class="font-bold text-white  text-4xl mb-3 inline-block mr-3">
                {{-- @if (Request::url() === 'your url here')
                    INFORMASI
                @endif --}}

                {{ Request::url() }}
            </a> <br>
            <a class="sm:font-bold text-white w-[70%] block mx-auto sm:text-md text-md font-light">Bidang </a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">
        <div class="bg-white p-10  w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic mb-3 text-center">{{ $category->name }}</p>
            <table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th class="text-center" data-priority="1">No</th>
                        <th class="text-left" data-priority="1">Informasi</th>
                        <th class="text-center" data-priority="2">Link/Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $v)
                        <tr>
                            <td class="text-md text-center ai-save">{{ $loop->index + 1 }}</td>
                            <td class="text-md">{{ $v->information }}</td>
                            <td class="text-center">
                                <a href="{{ $v->target }}" target="_blank"
                                    class="text-white text-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-2 py-1 mr-2 mb-2   focus:outline-none ">
                                    {!! $v->type === 0 ? 'Link' : 'Download' !!}
                                </a>
                            </td>
                        </tr>
                    @endforeach

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
