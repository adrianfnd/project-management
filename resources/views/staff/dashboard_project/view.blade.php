@extends('main')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Project FTTH</h4>
                        <form id="ftthProjectForm" method="POST" action="{{ route('project.update', $ftthProject->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_id">Tipe Project</label>
                                        <select class="form-control" id="type_id" name="type_id" required>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $ftthProject->type_id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">Nama Project</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name"
                                            value="{{ $ftthProject->project_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="olt_hostname">OLT Hostname</label>
                                        <input type="text" class="form-control" id="olt_hostname" name="olt_hostname"
                                            value="{{ $ftthProject->olt_hostname }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_sp2k_spa">No SP2K/SPA</label>
                                        <input type="text" class="form-control" id="no_sp2k_spa" name="no_sp2k_spa"
                                            value="{{ $ftthProject->no_sp2k_spa }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sbu_id">SBU</label>
                                        <select class="form-control" id="sbu_id" name="sbu_id" required>
                                            @foreach ($sbus as $sbu)
                                                <option value="{{ $sbu->id }}"
                                                    {{ $ftthProject->sbu_id == $sbu->id ? 'selected' : '' }}>
                                                    {{ $sbu->sbu_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hp_plan">HP Plan</label>
                                        <input type="text" class="form-control" id="hp_plan" name="hp_plan"
                                            value="{{ $ftthProject->hp_plan }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hp_built">HP Built</label>
                                        <input type="text" class="form-control" id="hp_built" name="hp_built"
                                            value="{{ $ftthProject->hp_built }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fat_total">FAT Total</label>
                                        <input type="text" class="form-control" id="fat_total" name="fat_total"
                                            value="{{ $ftthProject->fat_total }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fat_progress">FAT Progress</label>
                                        <input type="text" class="form-control" id="fat_progress" name="fat_progress"
                                            value="{{ $ftthProject->fat_progress }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fat_built">FAT Built</label>
                                        <input type="text" class="form-control" id="fat_built" name="fat_built"
                                            value="{{ $ftthProject->fat_built }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ip_olt">IP OLT</label>
                                        <input type="text" class="form-control" id="ip_olt" name="ip_olt"
                                            value="{{ $ftthProject->ip_olt }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kendala">Kendala</label>
                                        <textarea class="form-control" id="kendala" name="kendala" rows="3" required>{{ $ftthProject->kendala }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="progress">Progress</label>
                                        <input type="text" class="form-control" id="progress" name="progress"
                                            value="{{ $ftthProject->progress }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_id">Status</label>
                                        <select class="form-control" id="status_id" name="status_id" required>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ $ftthProject->status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->status_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date"
                                            value="{{ $ftthProject->start_date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="target">Target Selesai</label>
                                        <input type="date" class="form-control" id="target" name="target"
                                            value="{{ $ftthProject->target }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            value="{{ $ftthProject->end_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mapid">Lokasi Project</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="searchbox" placeholder="Cari lokasi" class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" id="searchbutton" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                                <div id="mapid" style="height: 400px;"></div>
                                <input type="hidden" id="latitude" name="latitude"
                                    value="{{ $ftthProject->latitude }}" required>
                                <input type="hidden" id="longitude" name="longitude"
                                    value="{{ $ftthProject->longitude }}" required>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="{{ route('dashboard_project') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var initialLat = {{ $ftthProject->latitude }};
                var initialLng = {{ $ftthProject->longitude }};

                var map = L.map('mapid').setView([initialLat, initialLng], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var marker = L.marker([initialLat, initialLng], {
                    draggable: true
                }).addTo(map);

                function updateLocationInfo(lat, lon) {
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;
                }

                marker.on('dragend', function(event) {
                    var position = marker.getLatLng();
                    updateLocationInfo(position.lat, position.lng);
                });

                document.getElementById('searchbutton').addEventListener('click', function() {
                    var location = document.getElementById('searchbox').value;
                    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.length > 0) {
                                var lat = parseFloat(data[0].lat);
                                var lon = parseFloat(data[0].lon);
                                marker.setLatLng([lat, lon]);
                                map.setView([lat, lon], 13);
                                updateLocationInfo(lat, lon);
                            } else {
                                alert('Lokasi tidak ditemukan');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        </script>
    @endpush
@endsection
