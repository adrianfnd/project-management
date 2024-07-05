{{-- EDIT PROJECT --}}

@extends('main')

@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Edit Project FTTH</h4>
                    <form id="ftthProjectForm" class="forms-sample" method="POST"
                        action="{{ route('project.update', $ftthProject->id) }}">
                        @csrf
                        @method('PUT')
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
                            @if ($errors->has('type_id'))
                                <span class="text-danger">{{ $errors->first('type_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="project_name">Nama Project</label>
                            <input type="text" class="form-control" id="project_name" name="project_name"
                                value="{{ $ftthProject->project_name }}" required>
                            @if ($errors->has('project_name'))
                                <span class="text-danger">{{ $errors->first('project_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="olt_hostname">OLT Hostname</label>
                            <input type="text" class="form-control" id="olt_hostname" name="olt_hostname"
                                value="{{ $ftthProject->olt_hostname }}" required>
                            @if ($errors->has('olt_hostname'))
                                <span class="text-danger">{{ $errors->first('olt_hostname') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="no_sp2k_spa">No SP2K/SPA</label>
                            <input type="text" class="form-control" id="no_sp2k_spa" name="no_sp2k_spa"
                                value="{{ $ftthProject->no_sp2k_spa }}" required>
                            @if ($errors->has('no_sp2k_spa'))
                                <span class="text-danger">{{ $errors->first('no_sp2k_spa') }}</span>
                            @endif
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
                            @if ($errors->has('sbu_id'))
                                <span class="text-danger">{{ $errors->first('sbu_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="hp_plan">HP Plan</label>
                            <input type="text" class="form-control" id="hp_plan" name="hp_plan"
                                value="{{ $ftthProject->hp_plan }}" required>
                            @if ($errors->has('hp_plan'))
                                <span class="text-danger">{{ $errors->first('hp_plan') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="hp_built">HP Built</label>
                            <input type="text" class="form-control" id="hp_built" name="hp_built"
                                value="{{ $ftthProject->hp_built }}" required>
                            @if ($errors->has('hp_built'))
                                <span class="text-danger">{{ $errors->first('hp_built') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fat_total">FAT Total</label>
                            <input type="text" class="form-control" id="fat_total" name="fat_total"
                                value="{{ $ftthProject->fat_total }}" required>
                            @if ($errors->has('fat_total'))
                                <span class="text-danger">{{ $errors->first('fat_total') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fat_progress">FAT Progress</label>
                            <input type="text" class="form-control" id="fat_progress" name="fat_progress"
                                value="{{ $ftthProject->fat_progress }}" required>
                            @if ($errors->has('fat_progress'))
                                <span class="text-danger">{{ $errors->first('fat_progress') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fat_built">FAT Built</label>
                            <input type="text" class="form-control" id="fat_built" name="fat_built"
                                value="{{ $ftthProject->fat_built }}" required>
                            @if ($errors->has('fat_built'))
                                <span class="text-danger">{{ $errors->first('fat_built') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ip_olt">IP OLT</label>
                            <input type="text" class="form-control" id="ip_olt" name="ip_olt"
                                value="{{ $ftthProject->ip_olt }}" required>
                            @if ($errors->has('ip_olt'))
                                <span class="text-danger">{{ $errors->first('ip_olt') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kendala">Kendala</label>
                            <textarea class="form-control" id="kendala" name="kendala" rows="3" required>{{ $ftthProject->kendala }}</textarea>
                            @if ($errors->has('kendala'))
                                <span class="text-danger">{{ $errors->first('kendala') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="progress">Progress</label>
                            <input type="text" class="form-control" id="progress" name="progress"
                                value="{{ $ftthProject->progress }}" required>
                            @if ($errors->has('progress'))
                                <span class="text-danger">{{ $errors->first('progress') }}</span>
                            @endif
                        </div>
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
                            @if ($errors->has('status_id'))
                                <span class="text-danger">{{ $errors->first('status_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ $ftthProject->start_date }}" required>
                            @if ($errors->has('start_date'))
                                <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="target">Target Selesai</label>
                            <input type="date" class="form-control" id="target" name="target"
                                value="{{ $ftthProject->target }}" required>
                            @if ($errors->has('target'))
                                <span class="text-danger">{{ $errors->first('target') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="end_date">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                value="{{ $ftthProject->end_date }}">
                            @if ($errors->has('end_date'))
                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="mapid">Lokasi Project</label>
                            <div class="input-group mb-2">
                                <input type="text" id="searchbox" placeholder="Cari lokasi" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" id="searchbutton" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div id="mapid" style="height: 400px;"></div>
                            <input type="hidden" id="latitude" name="latitude" value="{{ $ftthProject->latitude }}"
                                required>
                            @if ($errors->has('latitude'))
                                <span class="text-danger">{{ $errors->first('latitude') }}</span>
                            @endif
                            <input type="hidden" id="longitude" name="longitude" value="{{ $ftthProject->longitude }}"
                                required>
                            @if ($errors->has('longitude'))
                                <span class="text-danger">{{ $errors->first('longitude') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('dashboard_project') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
@endsection