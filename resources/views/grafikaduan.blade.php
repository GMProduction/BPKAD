@extends('base')

@section('content')
    <div class="mt-[-89px]  h-[350px] w-[100%] bg-black/40 z-[-1]  relative">
        <div class="absolute  bottom-[100px]  z-1 opacity-100 w-[100%] text-center">
            <a class="font-bold text-white  text-4xl">Grafik Pengelolaan Aduan</a> <br>
            <a class="font-bold text-white">Grafik Pengelola Aduan bpkad surakarta</a>
        </div>
    </div>
    <img class="absolute z-[-2] w-[100%]  h-[350px] object-cover top-0 left-0"
         src="{{ asset('assets/local/gedung.jpg') }}"/>

    <div class=" mt-16 mb-16">
        <div class="flex gap-4 w-[95%] mx-auto flex-wrap">
            <div class="flex-1 w-full">
                <div class="bg-white p-10   mx-auto shadow-md mb-6 transform transition duration-500">
                    <p class="text-primary font-bold text-3xl italic  text-center mb-10">Data Aduan</p>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tahun
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Aduan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aduan Sedang diproses
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aduan yang sudah selesai
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
                                        {{ $d->total }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $d->process }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $d->finish }}
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
                </div>
            </div>
            <div class=" md:w-[500px] w-full">
                <div class="bg-white p-10 mx-auto shadow-md mb-6 transform
                transition duration-500">
                    <p class="text-primary font-bold text-3xl italic  text-center mb-10">Grafik Pengelola Aduan</p>
                    <form class="max-w-sm mx-auto mb-12">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Tahun</label>
                        <select id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($years as $year)
                                <option {{ $loop->first ? 'selected' : '' }} value="{{ $year }}">{{$year}}</option>
                            @endforeach
                        </select>
                    </form>
                    <canvas class="w-100" id="myChart"></canvas>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('morejs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var path = '/{{ request()->path() }}';
        const ctx = document.getElementById('myChart');
        var chartEl;


        function generateChart() {
            let data = {
                labels: ['Belum diproses', 'Sedang Dalam Proses', 'Selesai'],
                datasets: [{
                    label: 'Jumlah',
                    data: [1, 0, 0],
                    borderWidth: 1
                }],
            };

            chartEl = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function eventChangeYear() {
            $('#year').on('change', function () {
                changeYearHandler();
            })
        }
        async function changeYearHandler() {
            try {
                let year = $('#year').val();
                let url = path + '?year=' + year;
                let response = await $.get(url);
                let data = response['data'];
                renewChart(data);
            } catch (e) {
                alert('error generate chart : (internal server error)')
            }
        }

        function renewChart(data = []) {
            chartEl.data.datasets[0].data = [];
            $.each(data, function (k, v) {
                chartEl.data.datasets[0].data.push(v);
            });
            chartEl.update();
        }

        $(document).ready(function () {
            generateChart();
            changeYearHandler();
            eventChangeYear();
        })
    </script>
@endsection
