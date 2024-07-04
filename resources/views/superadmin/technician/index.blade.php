@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Technicians</h2>
        <a href="{{ route('technician.create') }}" class="btn btn-primary mb-3">Add New Technician</a>
        <div class="table-responsive">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technicians as $technician)
                        <tr>
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
                            <td>
                                <span class="text-xs font-weight-bold">{{ $technician->email }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('technician.edit', $technician->id) }}" class="btn btn-sm btn-primary"
                                    role="button">Edit</a>
                                <form action="{{ route('technician.destroy', $technician->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
