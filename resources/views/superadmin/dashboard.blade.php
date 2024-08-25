{{-- DASHBOARD ADMIN --}}

@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4 justify-content-between">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects per Month</h5>
                        <canvas id="projectsPerMonthChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Project Completion Trend</h5>
                        <canvas id="projectCompletionTrendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects by Type</h5>
                        <canvas id="projectsByTypeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects by SBU</h5>
                        <canvas id="projectsBySbuChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Projects by Status</h5>
                        <canvas id="projectsByStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Lastest Projects table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Project Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Progress</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Start</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Target</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestProjects as $index => $project)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $project->project_name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $project->type->type_name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span
                                                        class="me-2 text-xs font-weight-bold">{{ $project->progress }}%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar"
                                                                aria-valuenow="{{ $project->progress }}" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width: {{ $project->progress }}%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $project->status->status_name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $project->start_date }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $project->target }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('projectsByTypeChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($projectsByType->pluck('type_name')) !!},
                datasets: [{
                    data: {!! json_encode($projectsByType->pluck('projects_count')) !!},
                    backgroundColor: {!! json_encode($projectsByTypeColors) !!}
                }]
            }
        });

        new Chart(document.getElementById('projectsBySbuChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($projectsBySbu->pluck('sbu_name')) !!},
                datasets: [{
                    data: {!! json_encode($projectsBySbu->pluck('projects_count')) !!},
                    backgroundColor: {!! json_encode($projectsBySbuColors) !!}
                }]
            }
        });

        new Chart(document.getElementById('projectsByStatusChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($projectsByStatus->pluck('status_name')) !!},
                datasets: [{
                    data: {!! json_encode($projectsByStatus->pluck('projects_count')) !!},
                    backgroundColor: {!! json_encode($projectsByStatusColors) !!}
                }]
            }
        });

        new Chart(document.getElementById('projectsPerMonthChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($projectsPerMonth->pluck('month')) !!},
                datasets: [{
                    label: 'Number of Projects',
                    data: {!! json_encode($projectsPerMonth->pluck('count')) !!},
                    backgroundColor: {!! json_encode($projectsPerMonthColor) !!} // Warna solid untuk bar chart
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

        new Chart(document.getElementById('projectCompletionTrendChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode($projectCompletionTrend->pluck('month')) !!},
                datasets: [{
                    label: 'Target',
                    data: {!! json_encode($projectCompletionTrend->pluck('target_count')) !!},
                    borderColor: {!! json_encode($projectCompletionTargetColor) !!}, // Warna kontras untuk garis Target
                    fill: false
                }, {
                    label: 'Completed',
                    data: {!! json_encode($projectCompletionTrend->pluck('completed_count')) !!},
                    borderColor: {!! json_encode($projectCompletionCompletedColor) !!}, // Warna berbeda untuk Completed
                    fill: false
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
