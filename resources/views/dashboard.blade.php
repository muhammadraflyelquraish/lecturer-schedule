@extends('layouts.main')

@section('container')
    <!-- {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div> --}} -->

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card highlight p-2">
                    <a class="card-block stretched-link text-decoration-none" href={{ route('users.index') }}>
                        <h4 class="card-title text-center m-5">USERS</h4>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card highlight p-2">
                    <a class="card-block stretched-link text-decoration-none" href={{ route('schedule.index') }}>
                        <h4 class="card-title text-center m-5">SCHEDULE</h4>

                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card highlight p-2">
                    <a class="card-block stretched-link text-decoration-none" href>
                        <h4 class="card-title text-center m-5">COURSES</h4>

                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <h5 class="text-center">Pertumbuhan Jumlah Mata Kuliah</h5>
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

        </div>
        <div class="col-6">
            <h5 class="text-center">Pertumbuhan Jumlah Mata Kuliah</h5>
            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>

        </div>
    </div>


    <div class="container m-5">
        <div class="row">
            <h6>Jumlah Dosen: {{ \App\Models\User::count() }}</h6>
        </div>
        <div class="row">
            <h6>Jumlah Kelas: {{ \App\Models\ClassModel::count() }} </h6>
        </div>
        <div class="row">
            <h6>Jumlah Matkul: {{ \App\Models\Matkul::count() }}</h6>
        </div>
    </div>


    <script>
        const xValues = [2021, 2022, 2023];
        const yValues = [24, 28, 42];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100
                        }
                    }],
                }
            }
        });

        const xValues2 = [2021, 2022, 2023];
        const yValues2 = [24, 28, 42];

        new Chart("myChart2", {
            type: "line",
            data: {
                labels: xValues2,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues2
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100
                        }
                    }],
                }
            }
        });
    </script>
@endsection
