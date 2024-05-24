{{-- DASHBOARD FFTH --}}

@extends('main')

@section('content')
    {{-- Content --}}
    <div class="container">
        <div class="filter-container">
            {{-- OLT Brand Info --}}
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL BRAND</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL OLT</h5>
                            <p class="card-text">682</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL HOMEPASS</h5>
                            <p class="card-text">342,724</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Summary OLT Brand</h5>
                            <canvas id="oltBrandChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data</h6>
                            <div class="search-container" style="width: 200px;">
                                <input type="text" id="searchInput" placeholder="Search..." class="form-control">
                                <button class="btn btn-primary" id="searchButton"
                                    style="position: absolute; right: 0; top: 0; bottom: 0;">
                                    <i class="fas fa-download"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No.</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Type</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                SBU</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cluster</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                OLT Hostname</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                OLT Brand</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Homepass Live</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">1. </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">TK2 </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">SBU Bandung </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">TK2_RJBB_KOTA
                                                    BANJAR_BALOKANG</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">JABAR-MINI.POP.BALOKANG-HW.MA5801-OLT-01</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">HUAWEI</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">856</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .card {
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
        }

        .container {
            padding: 2rem;
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-container button {
            position: absolute;
            right: 0;
            height: 100%;
            border: none;
            background: #1c3782;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('oltBrandChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['HUAWEI', 'FIBERHOME', 'RAISECOM', 'ZTE', 'BDCOM'],
                    datasets: [{
                        label: 'Total OLT',
                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        data: [500, 100, 50, 20, 10]
                    }, {
                        label: 'Homepass Live',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        data: [500, 100, 50, 20, 10]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    {{-- AKHIR CONTENT --}}
@endsection
