@extends('master')

@section('title', 'Tasks')
@section('page_title', 'Tasks')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task?->user?->name }}</td>
                                        <td>{{ $task?->category?->category_name }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>
                                            @if ($task->status == 'pending')
                                                <span class="badge bg-warning">{{ $statuses[$task->status] }}</span>
                                            @elseif($task->status == 'in_progress')
                                                <span class="badge bg-info">{{ $statuses[$task->status] }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $statuses[$task->status] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $task->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('tasks.destroy', $task->id) }}"
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
