@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Project FTTH</h4>
                        <form id="projectForm" class="forms-sample" method="POST"
                            action="{{ route('project.update', $project->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="type_id">Tipe Project</label>
                                <input type="text" class="form-control" id="type_id" name="type_id"
                                    value="{{ $project->type->type_name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="project_name">Nama Project</label>
                                <input type="text" class="form-control" id="project_name" name="project_name"
                                    value="{{ old('project_name', $project->project_name) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="olt_hostname">OLT Hostname</label>
                                <input type="text" class="form-control" id="olt_hostname" name="olt_hostname"
                                    value="{{ old('olt_hostname', $project->olt_hostname) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="no_sp2k_spa">No SP2K/SPA</label>
                                <input type="text" class="form-control" id="no_sp2k_spa" name="no_sp2k_spa"
                                    value="{{ old('no_sp2k_spa', $project->no_sp2k_spa) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="hp_plan">HP Plan</label>
                                <input type="number" class="form-control" id="hp_plan" name="hp_plan"
                                    value="{{ old('hp_plan', $project->hp_plan) }}">
                                @if ($errors->has('hp_plan'))
                                    <span class="text-danger">{{ $errors->first('hp_plan') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="hp_built">HP Built</label>
                                <input type="number" class="form-control" id="hp_built" name="hp_built"
                                    value="{{ old('hp_built', $project->hp_built) }}">
                                @if ($errors->has('hp_built'))
                                    <span class="text-danger">{{ $errors->first('hp_built') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fat_total">FAT Total</label>
                                <input type="number" class="form-control" id="fat_total" name="fat_total"
                                    value="{{ old('fat_total', $project->fat_total) }}">
                                @if ($errors->has('fat_total'))
                                    <span class="text-danger">{{ $errors->first('fat_total') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fat_progress">FAT Progress</label>
                                <input type="number" class="form-control" id="fat_progress" name="fat_progress"
                                    value="{{ old('fat_progress', $project->fat_progress) }}">
                                @if ($errors->has('fat_progress'))
                                    <span class="text-danger">{{ $errors->first('fat_progress') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fat_built">FAT Built</label>
                                <input type="number" class="form-control" id="fat_built" name="fat_built"
                                    value="{{ old('fat_built', $project->fat_built) }}">
                                @if ($errors->has('fat_built'))
                                    <span class="text-danger">{{ $errors->first('fat_built') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="ip_olt">IP OLT</label>
                                <input type="text" class="form-control" id="ip_olt" name="ip_olt"
                                    value="{{ old('ip_olt', $project->ip_olt) }}">
                                @if ($errors->has('ip_olt'))
                                    <span class="text-danger">{{ $errors->first('ip_olt') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="kendala">Kendala</label>
                                <textarea class="form-control" id="kendala" name="kendala" rows="4">{{ old('kendala', $project->kendala) }}</textarea>
                                @if ($errors->has('kendala'))
                                    <span class="text-danger">{{ $errors->first('kendala') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="progress">Progress (%)</label>
                                <input type="range" class="form-control-range" id="progress" name="progress"
                                    value="{{ old('progress', $project->progress) }}" min="0" max="100">
                                <span id="progressValue">{{ old('progress', $project->progress) }}</span>%
                                @if ($errors->has('progress'))
                                    <span class="text-danger">{{ $errors->first('progress') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ old('end_date', $project->end_date) }}">
                                @if ($errors->has('end_date'))
                                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('technician.project.index') }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var slider = document.getElementById("progress");
        var output = document.getElementById("progressValue");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        };
    </script>
@endsection
