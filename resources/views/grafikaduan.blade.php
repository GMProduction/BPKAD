@extends('base')

@section('content')
    <div class="page-content">
        <div class="background-overlay">
            <div class="overlay-text">
                <a class="font-bold text-white  text-4xl">Grafik Pengelolaan Aduan</a> <br>
                <a class="font-bold text-white">Grafik Pengelola Aduan bpkad surakarta</a>
            </div>
        </div>
        <img class="background-image" src="{{ asset('assets/local/aduan.png') }}" alt="Background" />
    </div>




    <section class="visi-misi-section">
        <img class="background" src="{{ asset('assets/local/ornament2.png') }}" alt="Aspirasi Image" />

        <div class="visi-misi-wrapper">

            <!-- Kiri: Kartu Visi & Misi -->
            <div class="visi-misi-cards">

                <!-- Card Visi -->
                <div class="card-visimisi ">
                    <div class="card-header">Grafik ADUAN</div>
                    <div class="card-body">
                        <div class="flex gap-4 w-[95%] mx-auto flex-wrap">
                            <div class="flex-1 w-full">
                                <div class="bg-white p-10   mx-auto shadow-md mb-6 transform transition duration-500">
                                    <p class="text-primary font-bold text-3xl italic  text-center mb-10">Data Aduan</p>
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-md text-left rtl:text-right text-gray-500 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                                                    <tr class="bg-white border-b ">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
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
                                                    <tr class="bg-white border-b ">
                                                        <th scope="row" colspan="5"
                                                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap ">
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
                                <div
                                    class="bg-white p-10 mx-auto shadow-md mb-6 transform
                transition duration-500">
                                    <p class="text-primary font-bold text-3xl italic  text-center mb-10">Grafik
                                        Pengelola Aduan</p>
                                    <form class="max-w-sm mx-auto mb-12">
                                        <label for="year" class="block mb-2 text-md font-medium text-gray-900 ">Pilih
                                            Tahun</label>
                                        <select id="year"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5     ">
                                            @foreach ($years as $year)
                                                <option {{ $loop->first ? 'selected' : '' }} value="{{ $year }}">
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                    <canvas class="w-100" id="myChart"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            $('#year').on('change', function() {
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
            $.each(data, function(k, v) {
                chartEl.data.datasets[0].data.push(v);
            });
            chartEl.update();
        }

        $(document).ready(function() {
            generateChart();
            changeYearHandler();
            eventChangeYear();
        })
    </script>
@endsection
