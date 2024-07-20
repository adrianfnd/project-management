@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Buat Surat Jalan</h4>
                        <form class="forms-sample" method="POST" action="{{ route('maintenance.pengajuan.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="project_id">Project</label>
                                <select class="form-control" id="project_id" name="project_id" required>
                                    <option value="">Pilih Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vendor_id">Vendor</label>
                                <select class="form-control" id="vendor_id" name="vendor_id" required>
                                    <option value="">Pilih Vendor</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                @error('vendor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="technician_id">Teknisi</label>
                                <select class="form-control" id="technician_id" name="technician_id" required>
                                    <option value="">Pilih Teknisi</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                                    @endforeach
                                </select>
                                @error('technician_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat Jalan</label>
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
                                @error('nomor_surat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('maintenance.pengajuan.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
