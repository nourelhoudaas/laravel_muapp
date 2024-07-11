@extends('base')

@section('title', 'Dashboard')

@section('content')

    <body>

            <!-- main section start -->
            <main>
                <h1>Dashboard</h1>
                <div class="insights">
                    <!-- start Employees -->
                    <div class="sales">
                        <span class="material-symbols-outlined">groups</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Employees</h3>
                                <h1>{{ $totalEmployes}}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end Employees -->

                    <!-- start Absence -->
                    <div class="expenses">
                        <span class="material-symbols-outlined">trending_down</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Absence</h3>
                                <h1>0</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end Absence -->

                    <!-- start Presence -->
                    <div class="income">
                        <span class="material-symbols-outlined">trending_up</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Presence</h3>
                                <h1>{{ $totalEmployes }}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end Presence -->
                </div>

                {{-- chart --}}
                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChart" ></canvas>
                    </div>
                    <div class="box">
                        <canvas id="myChart2" ></canvas>
                    </div>
                </div>
            </main>
            <!-- end main -->
        </div>
    </body>


{{-- chartt1 --}}
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
           scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

/* chartt2*/

    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
           scales: {
                y: {
                    beginAtZero: true
                }
            }

        }
    });
</script>

@endsection
