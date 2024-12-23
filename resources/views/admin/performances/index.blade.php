@extends('master')

@section('title', 'Performances')
@section('page_title', 'Performances')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Auth::user()->role == 'admin')
                        <div class="card-header">
                            <a href="{{ route('performances.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                    class="bi-file-earmark-plus-fill"></i> Add New</a>
                        </div>
                    @endif
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Task</th>
                                    <th>Grade</th>
                                    <th>Completion Percentage</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Action</th>
                                    @endif
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
                                        <td>{{ $performance?->creator?->name }}</td>
                                        <td>{{ $performance->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <a href="{{ route('performances.edit', $performance->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>
                                                <form action="{{ route('performances.destroy', $performance->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        @endif
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
