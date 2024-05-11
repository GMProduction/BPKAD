@extends('admin.base')
@section('css')
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
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


    <div class="panel h-full">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900  ">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">FAQ</a>
                    </div>
                </li>

            </ol>
        </nav>

        <div class="panel bg-white border">
            <div class=" p-4 rounded-lg ">
                <div class="flex justify-between mb-3 items-end">
                    <p class=" font-semibold">Data FAQ</p>
                    <button type="button" id="openmodaltambahdata"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                        <span class="material-symbols-outlined text-white mr-3">
                            add
                        </span>Tambah FAQ
                    </button>
                </div>

                <div class="relative overflow-x-auto">
                    <table id="table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Question
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Answer
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody id="bodyFaq">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal Tambah Tahun-->
        <div id="modaltambahdata" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b ">
                        <h3 class="text-xl font-semibold text-gray-900 " id="title-modal-tambah">
                            Tambah data FAQ
                        </h3>
                        <button type="button" onclick="modalt.hide()"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center ">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="post" onsubmit="return saveDataQuestion()" id="formQuestion">
                        @csrf
                        <input id="id" name="id" value="" class="hidden">
                        <!-- Modal body -->
                        <div class="p-6 ">
                            <form>
                                <div class="mb-3">

                                    <label for="message"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                                    <textarea id="question" rows="4" name="question"
                                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                              placeholder="Tulis Pertanyaan disini"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="answer"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
                                    <textarea id="answer" rows="4" name="answer"
                                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                              placeholder="Tulis Jawaban disini"></textarea>
                                </div>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-end p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button type="submit" id="btn-submit-information" onclick="saveDataQuestion()"
                                    class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300  focus:outline-none ">
                                <span class="material-symbols-outlined text-white mr-3">
                                    save
                                </span>Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
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
    @if (\Illuminate\Support\Facades\Session::has('type'))
        <script>
            let type = "{{ \Illuminate\Support\Facades\Session::get('type') }}"
            let el = document.getElementById(type + '-tab');
            el.ariaSelected = 'true'
        </script>
    @endif
    <script>
        let tabs = 1;

        const targetElm = document.getElementById('modaltambahdata');
        let modalt = new Modal(targetElm, {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            onShow: () => {

            },
            onHide: () => {

            }
        });

        $(document).ready(function () {
            datatable()
        })

        function resetModal() {
            $('#modaltambahdata #id').val('')
            $('#modaltambahdata #question').val('')
            $('#modaltambahdata #answer').val('')
        }
        $(document).on('click', '#openmodaltambahdata', function () {
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

            console.log(form_data);
            Swal.fire({
                title: title,
                text: "Apa kamu yakin ?",
                icon: "info",
                buttons: true,
                primariMode: true,
            }).then(async (res) => {
                if (res) {
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
                        success: function (data, textStatus, xhr) {
                            console.log(data);

                            if (xhr.status === 200) {
                                Swal.fire({
                                    icon: "success",
                                    title: "berhasil",
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then((dat) => {
                                    if (resposeSuccess) {
                                        resposeSuccess(data);
                                    } else {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire(data["msg"]);
                            }
                            console.log(data);
                        },
                        xhr: function () {
                            $("#progressbar").remove();
                            $("#" + form).append(
                                ' <div id="progressbar" class="w-full bg-gray-200 rounded-full dark:bg-gray-700">' +
                                '<div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"></div>' +
                                '</div>');
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener(
                                "progress",
                                function (evt) {
                                    if (evt.lengthComputable) {
                                        var percentComplete = (evt.loaded / evt.total) *
                                            100;
                                        //Do something with upload progress here
                                        // console.log(percentComplete)
                                        $("#progressbar div")
                                            .attr("style", "width:" + percentComplete + "%")
                                            .html(parseInt(percentComplete) + "%");
                                        if (percentComplete === 100) {
                                            $("#progressbar div").addClass("bg-success");
                                        }
                                    }
                                },
                                false
                            );
                            return xhr;
                        },
                        // uploadProgress: function(event, position, total, percentComplete){
                        //     var percentVal = percentComplete + '%';
                        //     console.log(percentVal);
                        //     console.log(percentVal);
                        //
                        // },
                        complete: function (xhr, textStatus) {
                            $("#progressbar").remove();
                        },
                        error: function (error, xhr, textStatus) {
                            // console.log("LOG ERROR", error.responseJSON.errors);
                            // console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                            $("#progressbar").remove();
                            console.log(error);
                            console.log(textStatus);
                            Swal.fire(
                                JSON.parse(error.responseText).errors ?
                                    JSON.parse(error.responseText).errors[
                                        Object.keys(JSON.parse(error.responseText).errors)[0]
                                        ][0] :
                                    JSON.parse(error.responseText)?.message ?
                                        JSON.parse(error.responseText).message :
                                        JSON.parse(error.responseText).msg ?
                                            JSON.parse(error.responseText).msg :
                                            error.responseJSON["msg"]
                            );
                            // swal(error.responseText ? JSON.parse(error.responseText).message : error.responseJSON['msg'] )
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
                fnRowCallback: function (
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
                            return '<div class="py-4 px-6">' +
                                '<a href="#!" id="editData" data-id="'+row.id+'" data-question="'+row.question+'" data-answer="'+row.answer+'" class="font-medium text-blue-600  button-link bg-blue-100 mr-2">Ubah</a>' +
                                '<a href="#" id="deleteData" data-id="'+row.id+'" data-question="'+row.question+'" data-answer="'+row.answer+'" ' +
                                '  class="font-medium text-red-700  button-link bg-red-100">Hapus</a>' +
                                '</div>';
                        }
                    },
                ]
            })
        }

        $(document).on('click', '#editData', function (ev) {
            let id = $(this).data('id')
            let question = $(this).data('question')
            let answer = $(this).data('answer')
            $('#modaltambahdata #id').val(id)
            $('#modaltambahdata #question').val(question)
            $('#modaltambahdata #answer').val(answer)
            modalt.show();
        })


        $(document).on('click','#deleteData', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let data = {
                '_token' : '{{csrf_token()}}'
            }
            Swal.fire({
                title: 'Konfirmasi',
                icon: 'info',
                text: 'Yakin ingin menghapus data  ?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
            }).then(async function (result) {
                if (result.isConfirmed) {
                    let res = await $.post('/admin/kustomisasi-faq/destroy/'+id, data)
                    afterSaveData()
                }
            });

        })
    </script>

    <script>
        jQuery.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
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
