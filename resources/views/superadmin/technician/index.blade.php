@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Technicians table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="d-flex justify-content-between align-items-center px-4 pb-3">
                            <div></div>
                            <a href="{{ route('technician.create') }}" class="btn btn-sm btn-primary" role="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Create technician">
                                <i class="fa fa-plus" style="margin-right: 5px; vertical-align: middle;"></i>
                                <span style="vertical-align: middle;">Create Technician</span>
                            </a>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($technicians as $index => $technician)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $technician->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $technician->username }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $technician->email }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('technician.edit', $technician->id) }}"
                                                    class="btn btn-xs btn-primary btn-sm me-2" role="button"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit technician">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('technician.destroy', $technician->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete technician">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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