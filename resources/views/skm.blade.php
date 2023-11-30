@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">SURVEY KEPUASAN MASYARAKAT</a> <br>
            <a class="font-bold text-white">Survey Kepuasan Masyarakat bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%]  mx-auto shadow-md mb-6 transform transition duration-500">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">Survey Kepuasan Masyarakat</p>




            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tahun
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Triwulan I
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Triwulan II
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Triwulan III
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Triwulan IV
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                2024
                            </th>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                2023
                            </th>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                $(file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                2022
                            </th>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                            <td class="px-6 py-4">
                                (file)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- <div class="w-full text-center">
                <a id="aImage" target="_blank">
                    <iframe style="height: 80vh"
                        src="https://drive.google.com/file/d/1her3udg4UWNYdpi3aNeZWli4QSy9EaGx/preview"
                        class="  object-cover w-[80%]  mx-auto " allow="autoplay"></iframe>
                </a>
            </div> --}}
        </div>
    </div>
@endsection

@section('morejs')
    <script></script>
@endsection
