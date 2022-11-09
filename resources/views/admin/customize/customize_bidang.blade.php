@extends('admin.base')



@section('css')
@endsection

@section('content')
    <div class="panel h-full">

        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/admin"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900  ">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                        <a href="/admin/customize_bidang"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2  ">Customize
                            Bidang</a>
                    </div>
                </li>

            </ol>
        </nav>




        <div class="panel bg-white border">
            <div class="border-b border-gray-200  mb-4">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 active"
                            id="sekretariat-tab" data-tabs-target="#sekretariat" type="button" role="tab"
                            aria-controls="sekretariat" aria-selected="true">Sekretariat</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2  "
                            id="anggaran-tab" data-tabs-target="#anggaran" type="button" role="tab"
                            aria-controls="anggaran" aria-selected="false">Anggaran</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="perbendaharaan-tab" data-tabs-target="#perbendaharaan" type="button" role="tab"
                            aria-controls="perbendaharaan" aria-selected="false">Perbendaharaan dan Akuntansi</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="tabs-btn inline-block  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 "
                            id="aset-tab" data-tabs-target="#aset" type="button" role="tab"
                            aria-controls="aset" aria-selected="false">Aset</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class=" p-4 rounded-lg  " id="sekretariat" role="tabpanel" aria-labelledby="sekretariat-tab">
                    <div>
                        <div class="mb-6">
                            <label for="sekretariat-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Sekretariat</label>
                            <textarea type="text" id="sekretariat-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="sekretariat-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="sekretariat-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="sekretariat-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="sekretariat-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="anggaran" role="tabpanel"
                    aria-labelledby="anggaran-tab">
                    <div>
                        <div class="mb-6">
                            <label for="anggaran-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Anggaran</label>
                            <textarea type="text" id="anggaran-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="anggaran-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="anggaran-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="anggaran-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg hidden" id="perbendaharaan" role="tabpanel"
                    aria-labelledby="perbendaharaan-tab">
                    <div>
                        <div class="mb-6">
                            <label for="perbendaharaan-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Perbendaharaan dan Akuntansi</label>
                            <textarea type="text" id="perbendaharaan-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="perbendaharaan-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="perbendaharaan-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="perbendaharaan-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
                <div class=" p-4 rounded-lg  hidden" id="aset" role="tabpanel" aria-labelledby="aset-tab">
                    <div>
                        <div class="mb-6">
                            <label for="aset-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Aset</label>
                            <textarea type="text" id="aset-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas "></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub"
                                class="block mb-2 text-sm font-medium text-gray-600 ">Subbagian</label>
                            <textarea type="text" id="aset-sub" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Subbagian"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="aset-sub-tugas" class="block mb-2 text-sm font-medium text-gray-600 ">Tugas
                                Subbagian</label>
                            <textarea type="text" id="aset-sub-tugas" rows="4"
                                class=" border border-gray-300 text-gray-900 text-sm  block w-full p-2.5 " placeholder="Tugas Subbagian"></textarea>
                        </div>

                        <button type="button" onclick="location.href='/admin/aspirasi/detail'"
                            class="ml-auto flex items-center text-white bg-primary hover:bg-primarylight focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2   focus:outline-none ">
                            <span class="material-symbols-outlined text-white mr-3">
                                done
                            </span>Ubah
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('morejs')
@endsection


</body>

</html>
