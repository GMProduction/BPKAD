@extends('admin.base')
@section('css')
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet"
        integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div class="panel-container pb-0">
        <div class="card  shadow-sm">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                </ol>
            </nav>
        </div>
        <!-- Konten lainnya -->
    </div>

    <div class="panel-container">

        <div class="panel bg-white border">
            <div class="d-flex justify-content-between mb-3 align-items-end">
                <p class="fw-semibold">Artikel</p>
                <button type="button" onclick="location.href='{{ route('admin.article.form') }}'"
                    class="bt-primary d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">add</span>
                    Tambah Artikel
                </button>
            </div>
            <div class="table-responsive shadow-sm">
                <table id="table" class="table table-striped align-middle">
                    <thead class="bg-light text-secondary text-uppercase small">
                        <tr>
                            <th style="width: 40px">#</th>
                            <th>Judul Artikel</th>
                            <th>Author</th>
                            <th style="width: 100px">Tanggal</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('morejs')
    <!--Datatables -->
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js"
        integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


    <script>
        let dataUrl = '{{ route('admin.article.datatable') }}';
        $(document).ready(function() {
            moment.locale("id");

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
                    row,
                    data,
                    displayIndex,
                    displayIndexFull
                ) {
                    const pageInfo = this.api().page.info();
                    const number = pageInfo.start + displayIndex + 1; // 1‑based
                    $('td:eq(0)', row).html(number); // kolom pertama
                },
                columns: [{
                        className: "",
                        orderable: false,
                        defaultContent: "",
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                        orderable: true
                    },
                    {
                        data: 'autor.name',
                        name: 'autor.name',
                        orderable: true,
                        render: function(data) {
                            return data ?? '';
                        }
                    },
                    {
                        data: 'date',
                        name: 'date',
                        orderable: true,
                        render: function(data) {
                            return moment(data).format('d MMMM YYYY')
                        }
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
                text: 'Yakin ingin menghapus data ' + name + ' ?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(async function(result) {
                if (result.isConfirmed) {
                    let res = await $.post('/admin/artikel/destroy/' + id, data)
                    window.location.reload()
                }
            });

        })
    </script>

    <script>
        function hapusArtikel(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data artikel akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request hapus via form tersembunyi atau AJAX
                    // Contoh pakai form:
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/article/${id}`;
                    form.innerHTML = `
                @csrf
                @method('DELETE')
            `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endsection
