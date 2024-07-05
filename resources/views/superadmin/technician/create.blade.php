@extends('main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create Technician</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('technician.store') }}" method="POST" class="p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger text-sm">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="text-danger text-sm">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-sm">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger text-sm">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Create Technician</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
