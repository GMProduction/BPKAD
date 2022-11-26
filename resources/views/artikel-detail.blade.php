@extends('base')

@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative ">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Artikel </a> <a class="font-bold text-4xl text-white">BPKAD</a> <br>
            <a class="sm:font-bold text-white sm:text-md text-sm font-light">Artikel terbaru dari kami</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
         src="{{ asset('assets/local/gedung.jpg') }}"/>

    <div class=" mt-16 mb-16">
        <div class="bg-white p-10  w-[95%] mx-auto shadow-md mb-6">
            <p class="text-primary font-bold text-3xl italic  text-center">{{$article ? $article->title : '' }}</p>
            <p class="text-primary font-bold  italic mb-6 text-center">{{$article ? date_format($article->created_at, 'd F Y') : ''}}</p>

            <div class="mt-6 ">
                <p class="text-justify">
                    @if($article && $article->cover)
                            <a href="{{asset($article->cover)}}" class="md:m-7 mb-3 md:w-[500px] " target="_blank" style="float: left">
                            <img class="w-full h-auto object-cover rounded-md "
                                 src="{{asset($article->cover ?? '/assets/local/logosurakarta.png')}}" onerror="this.onerror=null;this.src='{{asset('/assets/local/logosurakarta.png')}}'"/>
                        </a>
                    @endif
                    {!! $article ? $article->description : '' !!}</p>
            </div>
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
        $(document).ready(function () {

            var table = $('#example').DataTable({
                responsive: true
            })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@endsection
