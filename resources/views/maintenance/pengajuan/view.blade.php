@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Project FTTH</h4>
                        {{-- <div class="form-group">
                            <label for="type_id">Tipe Project</label>
                            <p>{{ $project->type->type_name }}</p>
                        </div> --}}
                        <div class="form-group">
                            <label for="project_name">Nama Project</label>
                            <p>{{ $project->project_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="olt_hostname">OLT Hostname</label>
                            <p>{{ $project->olt_hostname }}</p>
                        </div>
                        <div class="form-group">
                            <label for="no_sp2k_spa">No SP2K/SPA</label>
                            <p>{{ $project->no_sp2k_spa }}</p>
                        </div>
                        <div class="form-group">
                            <label for="sbu_id">SBU</label>
                            <p>{{ $project->sbu->sbu_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="hp_plan">HP Plan</label>
                            <p>{{ $project->hp_plan }}</p>
                        </div>
                        <div class="form-group">
                            <label for="hp_built">HP Built</label>
                            <p>{{ $project->hp_built }}</p>
                        </div>
                        <div class="form-group">
                            <label for="fat_total">FAT Total</label>
                            <p>{{ $project->fat_total }}</p>
                        </div>
                        <div class="form-group">
                            <label for="fat_progress">FAT Progress</label>
                            <p>{{ $project->fat_progress }}</p>
                        </div>
                        <div class="form-group">
                            <label for="fat_built">FAT Built</label>
                            <p>{{ $project->fat_built }}</p>
                        </div>
                        <div class="form-group">
                            <label for="ip_olt">IP OLT</label>
                            <p>{{ $project->ip_olt }}</p>
                        </div>
                        <div class="form-group">
                            <label for="kendala">Kendala</label>
                            <p>{{ $project->kendala }}</p>
                        </div>
                        <div class="form-group">
                            <label for="progress">Progress</label>
                            <p>{{ $project->progress }}</p>
                        </div>
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <p>{{ $project->status->status_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai</label>
                            <p>{{ $project->start_date }}</p>
                        </div>
                        <div class="form-group">
                            <label for="target">Target Selesai</label>
                            <p>{{ $project->target }}</p>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Tanggal Selesai</label>
                            <p>{{ $project->end_date }}</p>
                        </div>
                        <div class="form-group">
                            <label for="radius">Radius (meters)</label>
                            <p>{{ $project->radius }}</p>
                        </div>
                        <div class="form-group">
                            <label for="mapid">Lokasi Project</label>
                            <div id="mapid" style="height: 400px;"></div>
                        </div>
                        <h5 class="mt-4">Informasi Customer</h5>
                        <div class="form-group">
                            <label for="customer_name">Nama Customer</label>
                            <p>{{ $customer->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Nomor Telepon Customer</label>
                            <p>{{ $customer->phone }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Email Customer</label>
                            <p>{{ $customer->email }}</p>
                        </div>
                        <div class="form-group">
                            <label for="customer_address">Alamat Customer</label>
                            <p>{{ $customer->address }}</p>
                        </div>

                        <a href="{{ route('maintenance.pengajuan.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $project->latitude }};
            var lon = {{ $project->longitude }};
            var radius = {{ $project->radius }};

            var map = L.map('mapid').setView([lat, lon], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var customIcon = L.icon({
                iconUrl: '{{ asset('ui_dashboard/assets/img/map-icons/pole.png') }}',
                iconSize: [64, 64],
                iconAnchor: [32, 64],
                popupAnchor: [16, -64]
            });

            var marker = L.marker([lat, lon], {
                icon: customIcon
            }).addTo(map);

            var circle = L.circle([lat, lon], {
                color: '#1c3782',
                fillColor: '#aaf',
                fillOpacity: 0.5,
                radius: radius
            }).addTo(map);
        });
    </script>
@endsection
