@extends('admin.customize.base')
@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content-customize')
    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ \Illuminate\Support\Facades\Session::get('success') }}"
            })
        </script>
    @endif
    @if (\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire({
                icon: "error",
                text: "{{ \Illuminate\Support\Facades\Session::get('failed') }}"
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            @if ($errors->has('file-edit'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('file-edit') }}"
                })
            @endif
            @if ($errors->has('e-link-edit'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('e-link-edit') }}"
                })
            @endif

            @if ($errors->has('link'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('link') }}"
                })
            @endif
            @if ($errors->has('file'))
                Swal.fire({
                    icon: "error",
                    text: "{{ $errors->first('file') }}"
                })
            @endif
        </script>
    @endif
    <div class="panel-container">


        <div class="card border mb-4">
            <div class="card-header pb-0">
                <ul class="nav nav-underline" id="produkHukumTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="perda-tab" data-bs-toggle="tab" data-bs-target="#perda"
                            type="button" role="tab" aria-controls="perda" aria-selected="true" onclick="setTabs(1)">
                            Perda
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="perwali-tab" data-bs-toggle="tab" data-bs-target="#perwali"
                            type="button" role="tab" aria-controls="perwali" aria-selected="false"
                            onclick="setTabs(2)">
                            Perwali
                        </button>
                    </li>
                </ul>
            </div>

            <div class="card-body tab-content" id="produkHukumTabContent">
                <!-- PERDA -->
                <div class="tab-pane fade show active" id="perda" role="tabpanel" aria-labelledby="perda-tab">
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>Produk Hukum Perda</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-semibold">PERDA</h6>
                        <button id="openModalRegion" type="button" class="bt-primary" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPerda">
                            <span class="material-symbols-outlined me-2">add</span>Tambah PERDA
                        </button>
                    </div>

                    <div class="table-responsive shadow-sm">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th class="text-center"><span class="sr-only">Ubah</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $region->name }}</td>
                                        <td><a href="{{ $region->link }}" target="_blank">Download</a></td>
                                        <td class="text-center actionButtonContainer"><a class="sr-only deletebutton"
                                                onclick="deleteRegion({{ $region->id }})">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PERWALI -->
                <div class="tab-pane fade" id="perwali" role="tabpanel" aria-labelledby="perwali-tab">
                    <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                        <span class="material-symbols-outlined me-2">info</span>
                        <div>Produk Hukum Perwali</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 fw-semibold">PERWALI</h6>
                        <button id="openModalMayor" type="button" class="bt-primary" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPerwali">
                            <span class="material-symbols-outlined me-2">add</span>Tambah
                            PERWALI
                        </button>
                    </div>

                    <div class="table-responsive shadow-sm">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th class="text-center"><span class="sr-only">Ubah</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mayors as $mayor)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $mayor->name }}</td>
                                        <td><a href="{{ $mayor->link }}" target="_blank">Download</a></td>
                                        <td class="text-center actionButtonContainer">
                                            <a class="sr-only deletebutton"
                                                onclick="deleteMayor({{ $mayor->id }})">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- ============ Modal Tambah PERDA ============ -->
        <div class="modal fade" id="modalTambahPerda" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Produk Hukum PERDA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="form-perda" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="region">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="type_file" name="type_file">
                        <input type="hidden" name="service_type" value="2">

                        <div class="modal-body">
                            <!-- Nama PERDA -->
                            <div class="mb-3">
                                <label for="nama-perda" class="form-label">PERDA</label>
                                <input type="text" id="nama-perda" name="name" class="form-control"
                                    placeholder="Masukan Perda" required>
                            </div>

                            <!-- Pilihan Konten -->
                            <p class="small mb-2">Konten / Isi</p>
                            <div class="border rounded p-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input class="btn-check" type="radio" name="tr-konten" id="tr-link"
                                            value="tr-link" checked onclick="switchtambahKonten()">
                                        <label class="btn btn-outline-secondary w-100" for="tr-link">
                                            <strong>Link</strong><br><small>Konten menggunakan link</small>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="btn-check" type="radio" name="tr-konten" id="tr-file"
                                            value="tr-file" onclick="switchtambahKonten()">
                                        <label class="btn btn-outline-secondary w-100" for="tr-file">
                                            <strong>File</strong><br><small>Konten dengan file (max 2 MB)</small>
                                        </label>
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="mt-4" id="div-tambahlink">
                                    <label for="link-url" class="form-label">Link</label>
                                    <input type="text" id="link-url" name="url" class="form-control"
                                        placeholder="Masukan Link">
                                </div>

                                <!-- File -->
                                <div class="mt-4 d-none" id="div-tambahfile">
                                    <label for="upload-file-perda" class="form-label">Upload file</label>
                                    <input class="form-control" id="upload-file-perda" type="file" name="file"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-submit-perda" class="bt-primary">
                                <span class="material-symbols-outlined me-1">save</span> Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Tambah PERDA -->


        <!-- ============ Modal Tambah PERWALI ============ -->
        <div class="modal fade" id="modalTambahPerwali" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Produk Hukum PERWALI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="form-wali" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="mayor">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="type_fileperwali" name="type_fileperwali">
                        <input type="hidden" name="service_type" value="2">

                        <div class="modal-body">
                            <!-- Nama PERWALI -->
                            <div class="mb-3">
                                <label for="nama-perwali" class="form-label">PERWALI</label>
                                <input type="text" id="nama-perwali" name="name" class="form-control"
                                    placeholder="Masukan Nama Perwali" required>
                            </div>

                            <!-- Pilihan Konten -->
                            <p class="small mb-2">Konten / Isi</p>
                            <div class="border rounded p-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input class="btn-check" type="radio" id="tr-linkperwali"
                                            name="tr-kontenperwali" value="tr-linkperwali" checked
                                            onclick="switchtambahKontenperwali()">
                                        <label class="btn btn-outline-secondary w-100" for="tr-linkperwali">
                                            <strong>Link</strong><br><small>Konten menggunakan link</small>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="btn-check" type="radio" id="tr-fileperwali"
                                            name="tr-kontenperwali" value="tr-fileperwali"
                                            onclick="switchtambahKontenperwali()">
                                        <label class="btn btn-outline-secondary w-100" for="tr-fileperwali">
                                            <strong>File</strong><br><small>Konten dengan file (max 2 MB)</small>
                                        </label>
                                    </div>
                                </div>

                                <!-- Link -->
                                <div class="mt-4" id="div-tambahlinkperwali">
                                    <label for="link-url-perwali" class="form-label">Link</label>
                                    <input type="text" id="link-url-perwali" name="url" class="form-control"
                                        placeholder="Masukan Link">
                                </div>

                                <!-- File -->
                                <div class="mt-4 d-none" id="div-tambahfileperwali">
                                    <label for="upload-file-perwali" class="form-label">Upload file</label>
                                    <input class="form-control" id="upload-file-perwali" type="file" name="file"
                                        accept="application/pdf">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-submit-mayor" class="bt-primary">
                                <span class="material-symbols-outlined me-1">save</span> Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Tambah PERWALI -->



    </div>
@endsection

@section('morejs')
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js"
        integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous">
    </script>

    @if (\Illuminate\Support\Facades\Session::has('type'))
        <script>
            let type = "{{ \Illuminate\Support\Facades\Session::get('type') }}"
            let el = document.getElementById(type + '-tab');
            el.ariaSelected = 'true'
        </script>
    @endif
    <script>
        let tabs = 1;


        /* PERDA ------------------------------------------------------------*/
        function switchtambahKonten() {
            const isLink = document.querySelector('input[name="tr-konten"]:checked').value === 'tr-link';
            const divLink = document.getElementById('div-tambahlink');
            const divFile = document.getElementById('div-tambahfile');

            //  👇  Bootstrap: pakai .d-none untuk menyembunyikan
            divLink.classList.toggle('d-none', !isLink);
            divFile.classList.toggle('d-none', isLink);

            // 2 = link, 1 = file (sesuai backend lama)
            $('#type_file').val(isLink ? '2' : '1');
        }

        /* PERWALI ----------------------------------------------------------*/
        function switchtambahKontenperwali() {
            const isLink = document.querySelector('input[name="tr-kontenperwali"]:checked').value === 'tr-linkperwali';
            const divLink = document.getElementById('div-tambahlinkperwali');
            const divFile = document.getElementById('div-tambahfileperwali');

            divLink.classList.toggle('d-none', !isLink);
            divFile.classList.toggle('d-none', isLink);

            $('#type_fileperwali').val(isLink ? '2' : '1');
        }


        function setTabsModal(x) {
            if (x == 1) {
                document.querySelector('#div-tambahfile').classList.add("hidden");
                document.querySelector('#div-tambahlink').classList.remove("hidden");
                $('#type_file').val('2')
                console.log('aytas')
            } else {
                document.querySelector('#div-tambahfile').classList.remove("hidden");
                document.querySelector('#div-tambahlink').classList.add("hidden");
                $('#type_file').val('1')
                console.log('bbbb')
            }
        }

        function showPreview(event, div = "preview") {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById(div);
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function setTabs(x) {
            tabs = x;
            console.log(x);
            tableRegion.columns.adjust();
            tableMayor.columns.adjust();
        }

        function eventSwitchTab() {
            $('#myTab').on('shown.bs.tab', function(e) {
                console.log('test')
            });
        }


        function datatableRegion() {
            tableRegion = $('#table-region').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function datatableMayor() {
            tableMayor = $('#table-mayor').DataTable({
                processing: true,
                responsive: true,
                "aaSorting": [],
                "order": [],
                paging: true,
            })
        }

        function eventSubmitRegion() {
            $('#btn-submit-perda').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menyimpan data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        // deleteChartHandler(dataChartID);
                        $('#form-perda').submit();
                    }
                });
            })
        }

        function eventSubmitMayor() {
            $('#btn-submit-mayor').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menyimpan data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.value) {
                        // deleteChartHandler(dataChartID);
                        $('#form-wali').submit();
                    }
                });
            })
        }

        $(document).ready(function() {
            datatableRegion();
            datatableMayor();
            eventSwitchTab();
            eventSubmitRegion();
            eventSubmitMayor();
        });
    </script>

    <script>
        function deleteRegion(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data PERDA ini akan dihapus secara permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/produk-hukum/perda/delete/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Data PERDA berhasil dihapus.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        function deleteMayor(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data PERWALI ini akan dihapus secara permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/produk-hukum/perwali/delete/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Terhapus!',
                                text: 'Data PERWALI berhasil dihapus.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
