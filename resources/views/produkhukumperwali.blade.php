@extends('base')

@section('content')
    <x-page-headerhukum>
        <a class="font-bold text-white  text-4xl">Produk Hukum Perwali </a> <br>
        <a class="font-bold text-white">Produk Hukum Perwali BPKAD Surakarta</a>
    </x-page-headerhukum>
    <x-panel-content title="Produk Hukum PERWALI" cardStyle="margin-bottom: 10px; margin-top: 50px;">


        <div class="bg-white p-10  sm:w-[80%] w-[95%] mx-auto shadow-md mb-6 transform transition duration-500">
            <div class="w-full text-center">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-md text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Perwali
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Link
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mayors as $mayor)
                                <tr class="bg-white border-b  dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $mayor->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <a target="_blank" href="{{ $mayor->link }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            @if ($mayor->type == 1)
                                                Link
                                            @else
                                                Download
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-panel-content>
@endsection

@section('morejs')
@endsection
