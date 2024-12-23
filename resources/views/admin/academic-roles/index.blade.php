@extends('master')

@section('title', 'Academic roles')
@section('page_title', 'Academic roles')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('academic-roles.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Name</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($academicRoles as $academicRole)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $academicRole->role_name }}</td>
                                        <td>{{ $academicRole->description }}</td>
                                        <td>{{ $academicRole?->creator?->name }}</td>
                                        <td>{{ $academicRole->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('academic-roles.edit', $academicRole->id) }}"
                                                class="btn btn-sm btn-primary"> Edit</a>
                                            <form action="{{ route('academic-roles.destroy', $academicRole->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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
    </section>
@endsection
