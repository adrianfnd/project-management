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
            <h6 class="font-weight-bolder mb-0">Dashboard Daily Activity</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0 dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
    {{-- Content --}}
    <div class="container">
        <div class="filter-container">
            <div class="row">
                <div class="col-md-12">
                    <h5>1. SBU Bandung</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <canvas id="homepassChart"></canvas>
                        </div>
                        <div class="col-md-4">
                            <canvas id="fatChart"></canvas>
                        </div>
                        <div class="col-md-4">
                            <canvas id="progressChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="cb1">CB1</label>
                    <select id="cb1" class="form-control">
                        <option value="CB1">CB1</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="startDate">Start Date</label>
                    <input type="date" id="startDate" class="form-control" value="2024-05-12">
                </div>
                <div class="col-md-4">
                    <label for="endDate">End Date</label>
                    <input type="date" id="endDate" class="form-control" value="2024-05-19">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary mt-2" onclick="filterData()">Filter</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filterData() {
            // Implement filter logic here
        }

        // Data for charts
        const homepassData = {
            labels: ['12 May 2024', '13 May 2024', '14 May 2024', '15 May 2024'],
            datasets: [{
                label: 'Homepass Built',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: [30000, 30000, 30000, 30000],
            }, {
                label: 'Homepass Plan',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                data: [30000, 30000, 30000, 30000],
            }]
        };

        const fatData = {
            labels: ['12 May 2024', '13 May 2024', '14 May 2024', '15 May 2024'],
            datasets: [{
                label: 'FAT Built',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: [4000, 4000, 4000, 4000],
            }, {
                label: 'FAT Plan',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                data: [4000, 4000, 4000, 4000],
            }]
        };

        const progressData = {
            labels: ['12 May 2024', '13 May 2024', '14 May 2024', '15 May 2024'],
            datasets: [{
                label: 'Progress Real',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: [100, 100, 100, 100],
            }, {
                label: 'Progress Plan',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                data: [100, 100, 100, 100],
            }]
        };

        // Configurations for charts
        const configHomepass = {
            type: 'line',
            data: homepassData,
            options: {}
        };

        const configFat = {
            type: 'line',
            data: fatData,
            options: {}
        };

        const configProgress = {
            type: 'line',
            data: progressData,
            options: {}
        };

        // Initialize charts
        window.onload = function() {
            const homepassChart = new Chart(
                document.getElementById('homepassChart'),
                configHomepass
            );

            const fatChart = new Chart(
                document.getElementById('fatChart'),
                configFat
            );

            const progressChart = new Chart(
                document.getElementById('progressChart'),
                configProgress
            );
        };
    </script>
    {{-- AKHIR CONTENT --}}
@endsection
