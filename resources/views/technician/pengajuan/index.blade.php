{{-- DASHBOARD PROJECT --}}

@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4 justify-content-between">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Project</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_project }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">In Schedule Project</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $inschedule_project }}
                                        <span class="text-success text-sm font-weight-bolder">(
                                            {{ $inschedule_project_percentage }}% of total)</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Overdue Project</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $overdue_project }}
                                        <span class="text-success text-sm font-weight-bolder">(
                                            {{ $overdue_project_percentage }}% of total)</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Beyond Project</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $beyond_project }}
                                        <span class="text-success text-sm font-weight-bolder">(
                                            {{ $beyond_project_percentage }}% of total)</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Projects Map</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="row gx-3 gy-3">
                                <div id="map" style="height: 600px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Projects table</h6>
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
                                            Project
                                            Name</th>
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
                                            End</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <style>
                                    .selected-row {
                                        background-color: #e0e0e0;
                                    }
                                </style>
                                <tbody>
                                    @foreach ($selected_projects as $index => $project)
                                        <tr data-project-id="{{ $project->id }}" data-lat="{{ $project->latitude }}"
                                            data-lng="{{ $project->longitude }}">
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $project->project_name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $project->type->type_name }}
                                                </p>
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
                                                    class="text-secondary text-xs font-weight-bold">{{ $project->end_date }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @php
                                                    $surat_jalan = $project->suratjalans->first();
                                                @endphp
                                                @if ($surat_jalan->is_active == 'N')
                                                    <a href="{{ route('technician.pengajuan.view', $project->id) }}"
                                                        class="btn btn-xs btn-success btn-sm" role="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="View project">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button onclick="addToSelectedProjects({{ $project->id }})"
                                                        class="btn btn-xs btn-info btn-sm" role="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Add to Selected Projects">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                @else
                                                    <button onclick="updateSelectedProject({{ $project->id }})"
                                                        class="btn btn-xs btn-warning btn-sm" role="button"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Update Selected Project">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endif
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var successMessage = '{{ session('success') }}';
        var errorMessage = '{{ session('error') }}';
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: successMessage,
                showConfirmButton: false,
                timer: 2000
            });
        }

        if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: errorMessage,
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map;
        var markers = {};
        var selectedRow = null;
        var selectedMarker = null;

        function initializeTableListeners() {
            const tableRows = document.querySelectorAll('table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');
                    const lat = parseFloat(this.getAttribute('data-lat'));
                    const lng = parseFloat(this.getAttribute('data-lng'));

                    if (projectId && lat && lng) {
                        focusOnMarker(projectId, lat, lng);
                    }
                });
            });
        }

        function focusOnMarker(projectId, lat, lng) {
            const marker = markers[projectId];
            if (marker) {
                map.setView([lat, lng], 15);
                marker.openPopup();

                if (selectedRow) {
                    selectedRow.classList.remove('selected-row');
                }
                selectedRow = document.querySelector(`tr[data-project-id="${projectId}"]`);
                if (selectedRow) {
                    selectedRow.classList.add('selected-row');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            initializeMap();
            initializeTableListeners();
        });

        function initializeMap() {
            console.log('Initializing map...');
            try {
                map = L.map('map').setView([-6.200000, 106.816666], 10);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                console.log('Map initialized successfully');

                var projects = @json($projects);
                console.log('Projects:', projects);

                projects.forEach(function(project) {
                    console.log('Processing project:', project.id);

                    var popupContent = `
                <b>${project.project_name || 'Unnamed Project'}</b><br>
                Progress: ${project.progress || 'N/A'}<br>
                Kendala: ${project.kendala || 'None'}<br>
            `;

                    if (project.latitude && project.longitude) {
                        console.log('Adding marker for project:', project.id);
                        var markerColor = project.suratjalans && project.suratjalans[0] && project.suratjalans[0]
                            .is_active === 'Y' ? 'green' : 'red';
                        var markerIcon = L.icon({
                            iconUrl: `https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-${markerColor}.png`,
                            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41]
                        });

                        var marker = L.marker([project.latitude, project.longitude], {
                                icon: markerIcon
                            })
                            .addTo(map)
                            .bindPopup(popupContent);

                        markers[project.id] = marker;
                    } else {
                        console.warn(`Project ${project.id} has invalid coordinates`);
                    }
                });
            } catch (error) {
                console.error('Error initializing map:', error);
            }
        }

        function addToSelectedProjects(projectId) {
            $.ajax({
                url: `/staff/project/${projectId}/add-to-selected`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Surat Jalan berhasil ditambahkan.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message || 'Gagal menambahkan. Silakan coba kembali.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        }
    </script>
@endsection
