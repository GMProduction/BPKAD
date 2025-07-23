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


    <div class="panel-container">

        <div class="card border">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h5 class="card-title mb-0">Data FAQ</h5>
                    <button type="button" class=" bt-primary" data-bs-toggle="modal" data-bs-target="#modaltambahdata">
                        <i class="bi bi-plus-circle me-2"></i> Tambah FAQ
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="table" class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="bodyFaq">
                            <!-- Data FAQ will be injected here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah FAQ -->
        <div class="modal fade" id="modaltambahdata" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah data FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" onsubmit="return saveDataQuestion()" id="formQuestion">
                        @csrf
                        <input id="id" name="id" value="" type="hidden">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <textarea id="question" name="question" rows="4" class="form-control" placeholder="Tulis Pertanyaan disini"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea id="answer" name="answer" rows="4" class="form-control" placeholder="Tulis Jawaban disini"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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

        $(document).ready(function() {
            datatable()
        })

        function resetModal() {
            $('#modaltambahdata #id').val('')
            $('#modaltambahdata #question').val('')
            $('#modaltambahdata #answer').val('')
        }
        $(document).on('click', '#openmodaltambahdata', function() {
            resetModal()
            modalt.show();
        })

        function setTabs(x) {
            tabs = x
        }

        function saveDataQuestion() {
            console.log('asdasdas')
            saveDataForm('Tahun Layanan', 'formQuestion', '{{ route('customize.faq') }}', afterSaveData)
            return false;
        }

        function afterSaveData() {
            modalt.hide()
            $('#table').DataTable().ajax.reload()
        }

        async function saveDataForm(title, form, url, resposeSuccess, image = null) {
            var form_data = new FormData($("#" + form)[0]);

            Swal.fire({
                title: title,
                text: "Apa kamu yakin?",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Ya, simpan",
                cancelButtonText: "Batal",
            }).then(async (res) => {
                if (res.isConfirmed) {
                    if (image) {
                        if ($("#" + image).val()) {
                            let image1 = await handleImageUpload($("#" + image));
                            form_data.append("profile", image1, image1.name);
                        }
                    }

                    $.ajax({
                        type: "POST",
                        data: form_data,
                        url: url ?? window.location.pathname,
                        async: true,
                        processData: false,
                        contentType: false,
                        headers: {
                            Accept: "application/json",
                        },
                        success: function(data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    text: "Data berhasil disimpan!",
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then(() => {
                                    // RESET FORM
                                    $("#" + form).trigger("reset");
                                    $("#" + form + " #id").val('');
                                    $("#" + form + " #question").val('');
                                    $("#" + form + " #answer").val('');

                                    // TUTUP MODAL (pastikan ID-nya sesuai)
                                    const modalElement = document.getElementById(
                                        "modaltambahdata");
                                    const modalInstance = bootstrap.Modal.getInstance(
                                        modalElement);
                                    if (modalInstance) modalInstance.hide();

                                    // RELOAD
                                    location.reload();
                                });
                            } else {
                                Swal.fire("Gagal", data["msg"] || "Terjadi kesalahan", "error");
                            }
                        },
                        error: function(error) {
                            $("#progressbar").remove();
                            let msg = "Terjadi kesalahan";
                            try {
                                let response = JSON.parse(error.responseText);
                                msg = response?.errors ?
                                    response.errors[Object.keys(response.errors)[0]][0] :
                                    response?.message || response?.msg || msg;
                            } catch (e) {
                                console.log("Gagal parse error", e);
                            }

                            Swal.fire("Gagal", msg, "error");
                        },
                        xhr: function() {
                            $("#progressbar").remove();
                            $("#" + form).append(
                                '<div id="progressbar" class="w-full bg-gray-200 rounded-full mt-2">' +
                                '<div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"></div>' +
                                '</div>'
                            );
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = (evt.loaded / evt.total) *
                                        100;
                                    $("#progressbar div")
                                        .attr("style", "width:" + percentComplete + "%")
                                        .html(parseInt(percentComplete) + "%");
                                    if (percentComplete === 100) {
                                        $("#progressbar div").addClass("bg-success");
                                    }
                                }
                            }, false);
                            return xhr;
                        },
                        complete: function() {
                            $("#progressbar").remove();
                        },
                    });
                }
            });
            return false;
        }




        function datatable() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: '{{ route('customize.faq.datatable') }}',
                rowCallback: function(row, data, displayIndex, displayIndexFull) {
                    // info() → { start : index baris pertama di halaman }
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
                        data: 'question',
                        name: 'question',
                        orderable: true
                    },
                    {
                        data: 'answer',
                        name: 'answer',
                        orderable: true,
                    },
                    {
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render(data, x, row) {
                            return '<div class="actionButtonContainer">' +
                                '<a href="#!" id="editData" data-id="' + row.id + '" data-question="' + row
                                .question + '" data-answer="' + row.answer +
                                '" class="editbutton mr-2">Ubah</a>' +
                                '<a href="#" id="deleteData" data-id="' + row.id + '" data-question="' + row
                                .question + '" data-answer="' + row.answer + '" ' +
                                '  class="deletebutton">Hapus</a>' +
                                '</div>';
                        }
                    },
                ]
            })
        }

        const modalTambahData = new bootstrap.Modal(
            document.getElementById('modaltambahdata'), {
                backdrop: 'static', // ⬅ tak bisa ditutup klik luar (opsional)
                keyboard: false // ⬅ tak bisa ditutup ESC (opsional)
            }
        );

        $(document).on('click', '#editData', function(e) {
            e.preventDefault(); // jaga‑jaga kalau tombol link

            //  Ambil data dari atribut HTML
            const id = $(this).data('id');
            const question = $(this).data('question');
            const answer = $(this).data('answer');

            //  Isi field form pada modal
            $('#modaltambahdata #id').val(id);
            $('#modaltambahdata #question').val(question);
            $('#modaltambahdata #answer').val(answer);

            //  Tampilkan modal Bootstrap
            modalTambahData.show();
        });


        // hapus FAQ (versi Swal + reload halaman setelah sukses)
        $(document).on('click', '#deleteData', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            const text = $(this).data('name') ? `“${$(this).data('name')}”` : 'data ini';

            Swal.fire({
                title: 'Hapus Data',
                text: `Yakin ingin menghapus ${text} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                focusConfirm: false
            }).then(result => {
                if (!result.isConfirmed) return; // batal → tidak lakukan apa‑apa

                $.post(`/admin/kustomisasi-faq/destroy/${id}`, {
                        _token: '{{ csrf_token() }}'
                    })
                    .done(() => {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Data telah dihapus.',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => {
                            // jika memakai DataTable, pakai draw(); kalau tidak → reload halaman
                            if ($.fn.DataTable && $('#table').length) {
                                $('#table').DataTable().ajax.reload(null,
                                    false); // tanpa reset paging
                            } else {
                                location.reload();
                            }
                        });
                    })
                    .fail(err => {
                        Swal.fire({
                            title: 'Gagal',
                            text: err.responseJSON?.message || 'Terjadi kesalahan.',
                            icon: 'error'
                        });
                    });
            });
        });
    </script>
@endsection
