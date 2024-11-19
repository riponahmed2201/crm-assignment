@extends('master')

@section('title', 'Users')

@isset($user)
    @section('page_title', 'Edit User')
@else
@section('page_title', 'Add User')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i> Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
            @csrf
            @isset($user)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ isset($user) ? $user->name : old('name') }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ isset($user) ? $user->email : old('email') }}">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ isset($user) ? $user->phone : old('phone') }}">
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-select" name="role">
                                <option selected>Select Role</option>
                                <option
                                    @isset($user) {{ $user->role == 'admin' ? 'selected' : '' }} @endisset
                                    value="admin">Admin
                                </option>
                                <option
                                    @isset($user) {{ $user->role == 'user' ? 'selected' : '' }} @endisset
                                    value="user">User
                                </option>
                            </select>
                            @error('role')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
