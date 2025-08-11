@extends('admin.customize.base')

@section('head')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content-customize')
    <div class="panel-container">


        @if (\Illuminate\Support\Facades\Session::has('failed'))
            <div class="alert alert-danger" role="alert">
                <span class="font-medium">Gagal!</span>
                {{ \Illuminate\Support\Facades\Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success" role="alert">
                <span class="font-medium">Berhasil!</span> {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif
        <div class="panel bg-white border">
            <div class="flex justify-between mb-3 items-end">
                <p class=" font-semibold">Aplikasi Video Youtube</p>
                <button type="button" onclick="location.href='{{ route('customize.youtube.form') }}'"
                    class="ml-auto bt-primary">
                    <span class="material-symbols-outlined me-2">add</span>
                    Tambah Video
                </button>
            </div>
            <div class="overflow-x-auto relative shadow-sm ">
                <table id="table" class="w-full text-md text-left text-gray-500  ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Url
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    {{--                    <tbody> --}}
                    {{--                        <tr class="bg-white border-b "> --}}
                    {{--                            <th class="text-center"> --}}
                    {{--                                1 --}}
                    {{--                            </th> --}}
                    {{--                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 "> --}}
                    {{--                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan --}}
                    {{--                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan --}}
                    {{--                                1.500 Orang Bersih-Bersih Kawasan Sriwedari Solo, Alat Berat Ikut Dikerahkan --}}
                    {{--                            </th> --}}
                    {{--                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap "> --}}
                    {{--                                10 November 2022 --}}
                    {{--                            </th> --}}
                    {{--                            <td class="py-4 px-6 text-right whitespace-nowrap"> --}}
                    {{--                                <a href="#" data-modal-toggle="modalEdit" onclick="" --}}
                    {{--                                    class="font-medium text-blue-600  button-link bg-blue-100">Ubah</a> --}}

                    {{--                                    <a href="#" data-modal-toggle="modalEdit" --}}
                    {{--                                    class="font-medium text-red-700  button-link bg-red-100">Hapus</a> --}}
                    {{--                            </td> --}}
                    {{--                        </tr> --}}
                    {{--                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        let dataUrl = '{{ route('customize.youtube.datatable') }}';
        $(document).ready(function() {

            // .columns.adjust()
            // .responsive.recalc();
            datatable()
        });

        function datatable() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: dataUrl,
                fnRowCallback: function(
                    nRow,
                    aData,
                    iDisplayIndex,
                    iDisplayIndexFull
                ) {
                    // debugger;
                    var numStart = this.fnPagingInfo().iStart;
                    var index = numStart + iDisplayIndexFull + 1;
                    // var index = iDisplayIndexFull + 1;
                    $("td:first", nRow).html(index);
                    return nRow;
                },
                columns: [{
                        className: "",
                        orderable: false,
                        defaultContent: "",
                        searchable: false
                    },
                    {
                        data: 'url',
                        name: 'url',
                        orderable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            })
        }

        $(document).on('click', '#deleteData', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let data = {
                '_token': '{{ csrf_token() }}'
            }
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin menghapus data  ?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(async function(result) {
                if (result.isConfirmed) {
                    let res = await $.post('/admin/kustomisasi-video-youtube/destroy/' + id, data)
                    window.location.reload()
                }
            });

        })

        jQuery.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
    </script>
@endsection
