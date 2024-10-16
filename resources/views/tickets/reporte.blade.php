@extends('adminlte::page')

@section('title', 'Ver Tickets')

@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- area chart --}}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Area chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="areaChart" style="height: 250px;"></canvas>
                    </div>
                </div>
            </div>
            {{-- donut chart --}}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Donut Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            {{-- line chart --}}
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Line Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height: 250px;"></canvas>
                    </div>
                </div>
            </div>
            {{-- bar chart --}}
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height: 250px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @php
        $no_atendidos = '';
        $si_atendidos = '';
        $mes = '';
        echo "aaa";
    @endphp

    @foreach ($noatendidos as $noatendido)
        @php
            $no_atendidos = $no_atendidos . $noatendido->mes_count_0 . ',';
            $mes = $mes . $noatendido->mes_0 . ',';
        @endphp
    @endforeach

    @php
        $mes = '[' . $mes . ']';
        $no_atendidos = '[' . $no_atendidos . ']';
    @endphp

    @foreach ($siatendidos as $siatendido)
        @php
            $si_atendidos = $si_atendidos . $siatendido->mes_count_1 . ',';
        @endphp
    @endforeach

    @php
        $si_atendidos = '[' . $si_atendidos . ']';
    @endphp
    <script>
        (function() {
            console.log("mes", {{ $mes }}, "no_atendidos", {{ $no_atendidos }}, "si_atendidos",
                {{ $si_atendidos }});

            // Sample data (replace these with your actual data from the controller)
            let mes = {{ $mes }};
            let no_atendidos = {{ $no_atendidos }};
            let si_atendidos = {{ $si_atendidos }};

            // Combine labels and data into an array of objects for sorting
            let combinedData = mes.map((month, index) => ({
                month: month,
                noAtendidos: no_atendidos[index] || 0,
                siAtendidos: si_atendidos[index] || 0
            }));

            // Sort the combined data by month
            combinedData.sort((a, b) => a.month - b.month);

            // Extract sorted labels and data back into separate arrays
            let sortedMes = combinedData.map(item => item.month);
            let sortedNoAtendidos = combinedData.map(item => item.noAtendidos);
            let sortedSiAtendidos = combinedData.map(item => item.siAtendidos);

            // Area Chart
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
            var areaChartData = {
                labels: sortedMes,
                datasets: [{
                    label: 'No atendidos',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    data: sortedNoAtendidos,
                    fill: true // Fill under the line
                }, {
                    label: 'Atendidos',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    data: sortedSiAtendidos,
                    fill: true // Fill under the line
                }]
            };

            var areaChartOptions = {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            });

            // Line Chart
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            });

            // Pie Chart
            console.log("antes");    
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            console.log("fa", pieChartCanvas);    
            var pieData = [{
                value: 700,
                backgroundColor: '#f56954',
                label: 'Chrome'
            }, {
                value: 500,
                backgroundColor: '#00a65a',
                label: 'IE'
            }, {
                value: 400,
                backgroundColor: '#f39c12',
                label: 'FireFox'
            }, {
                value: 600,
                backgroundColor: '#00c0ef',
                label: 'Safari'
            }, {
                value: 300,
                backgroundColor: '#3c8dbc',
                label: 'Opera'
            }, {
                value: 100,
                backgroundColor: '#d2d6de',
                label: 'Navigator'
            }];

            var pieOptions = {
                responsive: true,
                maintainAspectRatio: true,
            };

            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: pieData.map(item => item.value),
                        backgroundColor: pieData.map(item => item.backgroundColor),
                    }],
                    labels: pieData.map(item => item.label)
                },
                options: pieOptions
            });

            // Bar Chart
            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var barChartData = areaChartData;
            barChartData.datasets[1].backgroundColor = '#00a65a'; // Change color for the second dataset

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });
        })();
    </script>


@stop
