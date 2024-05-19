{{-- DASHBOARD FFTH --}}

@extends('main')

@section('content')
    {{-- NAVBAR --}}
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Dashboard FFTH</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('ui_dashboard') }}/assets/img/team-2.jpg"
                                                class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('ui_dashboard') }}/assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .container {
            margin-top: 20px
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .filter-container select {
            margin-right: 10px;
            margin-bottom: 10px;
            flex: 1;
        }

        .filter-container .filter-button,
        .filter-container .camera-button {
            background-color: #1d3557;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .filter-container .camera-button {
            background-color: #f1faee;
            color: #1d3557;
            border: 1px solid #1d3557;
        }

        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: center;
            margin-top: 20px;
        }

        .dashboard-stats .stat {
            margin: 10px;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .dashboard-stats .stat-number {
            font-size: 2.5em;
            color: #1d3557;
            font-weight: bold;
        }

        .dashboard-stats .stat-label {
            font-size: 1em;
            color: #457b9d;
            margin-top: 5px;
        }

        .dashboard-stats .stat-total {
            font-size: 0.9em;
            color: #8d99ae;
        }

        @media (max-width: 768px) {
            .dashboard-stats .stat {
                flex: 1 1 100%;
            }
        }
    </style>
    {{-- Content --}}
    <div class="container">
        <div class="filter-container">
            <select class="form-select" id="filterDropdown1" name="type" form="filterForm">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ request()->input('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="filterDropdown2" name="sbu" form="filterForm">
                @foreach ($sbus as $sbu)
                    <option value="{{ $sbu->id }}" {{ request()->input('sbu') == $sbu->id ? 'selected' : '' }}>
                        {{ $sbu->sbu_name }}</option>
                @endforeach
            </select>

            <form id="filterForm" action="{{ url()->current() }}" method="GET">
            </form>

            <script>
                document.getElementById('filterDropdown1').addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
                document.getElementById('filterDropdown2').addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            </script>

            <button class="filter-button">
                <i class="fas fa-filter"></i>
            </button>
            <button class="camera-button">
                <i class="fas fa-camera"></i>
            </button>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row gx-3 gy-3">
            <!-- Homepass Live -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Homepass Live</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar-1" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var chartData1 = @json($chartData1);
                    var ctx = document.getElementById('chart-bar-1').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: chartData1,
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>

            <!-- Progress Homepass -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Progress Homepass</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-pie1" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Projects Count Per Category</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+23%</span>) than last week</p>
                    </div>
                </div>
            </div>

            <!-- GAP Homepass (Sisa) -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">GAP Homepass (Sisa)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar2" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Homepass Progress QC -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Homepass Progress QC</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar3" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- HP Invoiced -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">HP Invoiced</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar4" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                        <div class="container border-radius-lg">
                            <div class="row g-2">
                                <div class="col-3">
                                    <div class="text-center">
                                        <h6 class="text-primary">Rp0</h6>
                                        <p class="text-sm">Terbayar</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <h6 class="text-danger">Rp0</h6>
                                        <p class="text-sm">Antrian</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <h6 class="text-warning">Rp0</h6>
                                        <p class="text-sm">Invoice</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <h6 class="text-secondary">Rp0</h6>
                                        <p class="text-sm">BAPS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Homepass/Task (Sisa) -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Homepass/Task (Sisa)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar5" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Homepass Progress BAPS -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Homepass Progress BAPS</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar6" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Home Connected -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Home Connected</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar7" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- TUR -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">TUR</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar8" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Progress Pembayaran (Terbayar) -->
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Progress Pembayaran (Terbayar)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar9" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Progress Pembayaran (Antrian) -->
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Progress Pembayaran (Antrian)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar10" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Progress Pembayaran (Invoice) -->
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Progress Pembayaran (Invoice)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar11" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>

            <!-- Progress Pembayaran (BAPS) -->
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <h6 class="ms-2 mt-4 mb-0">Progress Pembayaran (BAPS)</h6>
                        <div class="card-body p-3 bg-white">
                            <div class="chart">
                                <canvas id="chart-bar12" class="chart-canvas"></canvas>
                            </div>
                        </div>
                        <h6 class="ms-2 mt-4 mb-0">Sales Growth</h6>
                        <p class="text-sm ms-2">(<span class="font-weight-bolder">+30%</span>) than last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR CONTENT --}}
@endsection
