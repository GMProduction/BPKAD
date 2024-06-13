@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Produk Hukum Perda </a> <br>
            <a class="font-bold text-white">Produk Hukum Perda BPKAD Surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
         src="{{ asset('assets/local/gedung.jpg') }}"/>

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">Produk Hukum PERDA</p>
            <div class="w-full text-center">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Perda
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Link
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $region->name }}
                                </td>

                                <td class="px-6 py-4">
                                    <a target="_blank"
                                       href="{{ $region->link }}"
                                       class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Link</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('morejs')
@endsection
