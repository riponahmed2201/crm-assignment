@extends('master')

@section('title', 'Tasks')
@section('page_title', 'Tasks')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @if (Auth::user()->role == 'admin')
                        <div class="card-header">
                            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                    class="bi-file-earmark-plus-fill"></i> Add New</a>
                        </div>
                    @endif

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
                                    <th>Assign By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Action</th>
                                    @endif
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
                                        <td>{{ $task?->creator?->name }}</td>
                                        <td>{{ $task->created_at->diffForHumans() }}</td>

                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
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
