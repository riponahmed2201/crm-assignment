@extends('master')

@section('title', 'Users')
@section('page_title', 'Users')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add User</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td> <span class="badge rounded-pill bg-primary">{{ ucwords($user->role) }}</span>
                                        </td>
                                        <td>{{ $user?->created_at?->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary rounded-pill"> Edit</a>
                                            @if ($user->deletable)
                                                <a href="{{ route('users.destroy', $user->id) }}"
                                                    class="btn btn-sm btn-danger rounded-pill"> Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
