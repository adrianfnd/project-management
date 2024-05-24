{{-- DASHBOARD FFTH --}}

@extends('main')

@section('content')
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
