@extends('master')

@section('title', 'Performances')
@section('page_title', 'Performances')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('performances.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Task</th>
                                    <th>Grade</th>
                                    <th>Completion Percentage</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($performances as $performance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $performance?->user?->name }}</td>
                                        <td>{{ $performance?->task?->title }}</td>
                                        <td>{{ $performance?->grade }}</td>
                                        <td>{{ $performance->completion_percentage }}</td>
                                        <td>{{ $performance->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('performances.edit', $performance->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('performances.destroy', $performance->id) }}"
                                                class="btn btn-sm btn-danger">
                                                Delete</a>
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
