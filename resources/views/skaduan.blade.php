@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">SK Pengelola Aduan</a> <br>
            <a class="font-bold text-white">SK Pengelola Aduan bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0" src="{{ asset('assets/local/gedung.jpg') }}" />

    <div class=" mt-16 mb-16">


        <div class="bg-white p-10  sm:w-[80%] w-[95%]  mx-auto shadow-md mb-6 transform transition duration-500">
            <p class="text-primary font-bold text-3xl italic  text-center mb-10">SK Pengelola Aduan</p>




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
                        @forelse($data as $d)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $d->year }}
                                </th>
                                <td class="px-6 py-4">
                                    @if ($d->quarter_1)
                                        <a role="button" href="{{ $d->quarter_1 }}" target="_blank"
                                            class="button-link">Download</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($d->quarter_2)
                                        <a role="button" href="{{ $d->quarter_2 }}" target="_blank"
                                            class="button-link">Download</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($d->quarter_3)
                                        <a role="button" href="{{ $d->quarter_3 }}" target="_blank"
                                            class="button-link">Download</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($d->quarter_4)
                                        <a role="button" href="{{ $d->quarter_4 }}" target="_blank"
                                            class="button-link">Download</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5"
                                    class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Data tidak tersedia
                                </th>
                            </tr>
                        @endforelse
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
