@extends('master')

@section('title', 'Research projects')
@section('page_title', 'Research projects')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @if (Auth::user()->role == 'admin')
                        <div class="card-header">
                            <a href="{{ route('research-projects.create') }}" class="btn btn-sm btn-primary float-end"> <i
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Assign By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($researchProjects as $researchProject)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $researchProject?->user?->name }}</td>
                                        <td>{{ $researchProject?->task?->title }}</td>
                                        <td>{{ $researchProject->title }}</td>
                                        <td>{{ $researchProject->description }}</td>
                                        <td>
                                            @if ($researchProject->status == 'pending')
                                                <span
                                                    class="badge bg-warning">{{ $statuses[$researchProject->status] }}</span>
                                            @elseif($researchProject->status == 'in_progress')
                                                <span class="badge bg-info">{{ $statuses[$researchProject->status] }}</span>
                                            @elseif($researchProject->status == 'on_hold')
                                                <span
                                                    class="badge bg-primary">{{ $statuses[$researchProject->status] }}</span>
                                            @elseif($researchProject->status == 'completed')
                                                <span
                                                    class="badge bg-success">{{ $statuses[$researchProject->status] }}</span>
                                            @else
                                                <span
                                                    class="badge bg-danger">{{ $statuses[$researchProject->status] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $researchProject?->creator?->name }}</td>
                                        <td>{{ $researchProject->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <a href="{{ route('research-projects.edit', $researchProject->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>
                                                <form
                                                    action="{{ route('research-projects.destroy', $researchProject->id) }}"
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
