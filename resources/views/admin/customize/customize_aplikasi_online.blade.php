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
                {{ Session::get('failed') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success" role="alert">
                <span class="font-medium">Berhasil!</span> {{ Session::get('success') }}
            </div>
        @endif
        <div class="panel bg-white border">
            <div class="d-flex justify-content-between align-items-end mb-3">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4 class="mb-0">Aplikasi ONLINE</h4>
                    </div>
                </div>

                <button type="button" onclick="location.href='{{ route('customize.aplikasi.online.form') }}'"
                    class="bt-primary d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">add</span>
                    Tambah Aplikasi Online
                </button>
            </div>

            <div class="alert alert-info small">
                <strong>Catatan:</strong> tabel ini menampilkan aplikasi online yang sudah dimasukan.
            </div>


            <div class="border border-gray-200 p-4">
                <div class="overflow-x-auto relative shadow-sm ">
                    <table id="table" class="w-full text-md text-left text-gray-500  ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    #
                                </th>
                                <th scope="col" class="py-3 px-6" width="100">
                                    Gambar
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Deskripsi Pendek
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Deskripsi Panjang
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
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        let dataUrl = '{{ route('customize.aplikasi.online.datatable') }}';
        $(document).ready(function() {

            // .columns.adjust()
            // .responsive.recalc();
            datatable()
        });

        function datatable() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                responsive: false,
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
                        data: 'image',
                        name: 'name',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return "<img src='" + data + "' width='100' />"
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true
                    },
                    {
                        data: 'short_description',
                        name: 'short_description',
                        orderable: true
                    },
                    {
                        data: 'description',
                        name: 'description',
                        orderable: true,
                        className: 'wrap-text'
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
                    let res = await $.post('/admin/kustomisasi-aplikasi-online/destroy/' + id, data)
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
