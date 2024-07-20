@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pengajuan Pemasangan</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Project</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Customer</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surat_jalans as $project)
                                        <tr>
                                            <td>{{ $project->project_name }}</td>
                                            <td>{{ $project->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $project->customers->first()->name }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm approve-btn"
                                                    data-id="{{ $project->id }}">Setujui</button>
                                                <button class="btn btn-danger btn-sm decline-btn"
                                                    data-id="{{ $project->id }}">Tolak</button>
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.approve-btn').click(function() {
                var projectId = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menyetujui pengajuan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, setujui!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/maintenance/pemasangan/' + projectId + '/approve',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Disetujui!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });

            $('.decline-btn').click(function() {
                var projectId = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menolak pengajuan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/maintenance/pemasangan/' + projectId + '/decline',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Ditolak!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
