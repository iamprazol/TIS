@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">Total Informations On Each Purposes</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="myChart" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Entries</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush"  style=" overflow-y:scroll;
   height:400px;
   display:block; overflow-x: hidden; width: 500px;">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Purposes</th>
                                <th scope="col">Tourists</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purposes as $purpose)
                                <tr>
                                    <th scope="row">
                                        {{ $purpose->purpose }}
                                    </th>
                                    <td>
                                        {{ $purpose->userpurpose->count() }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">{{ ($purpose->userpurpose->count()/$userpurpose->count())*100 }}</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%; color: @php  sprintf('#%06X', mt_rand(0, 0xFFFFFF)); @endphp"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Total Informations On Each Purposes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="myPieChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="/js/chart.bundle.js"></script>
    <script src="/js/utils.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

@section('chart')
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach($purposes as $purpose)
                    "{{ $purpose->purpose }}",
                    @endforeach],
                datasets: [{
                    label: 'Total number of tourists',
                    data: [ @foreach ($purposes as $purpose)
                        {{$purpose->userpurpose->count()}},
                        @endforeach],
                    backgroundColor: [ @foreach($purposes as $purpose)
                        'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 0.4)',
                        @endforeach

                    ],
                    borderColor: [ @foreach($purposes as $purpose)
                        'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 1)',
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options : {
                scales: {
                    xAxes: [{
                        barPercentage: 0.8,
                        barThickness: 10,
                        maxBarThickness: 15,
                        minBarLength: 2,
                        stacked: true,
                        gridLines: {
                            offsetGridLines: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("myPieChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: [@foreach($purposes as $purpose)
                    "{{ $purpose->purpose }}",
                    @endforeach],
                datasets: [{
                    label: 'Total number of tourists',
                    data: [ @foreach ($purposes as $purpose)
                        {{$purpose->userpurpose->count()}},
                        @endforeach],
                    backgroundColor: [ @foreach($purposes as $purpose)
                        'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 0.5)',
                        @endforeach

                    ],
                    borderColor: [ @foreach($purposes as $purpose)
                        'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 1)',
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },

        });
    </script>

@endsection