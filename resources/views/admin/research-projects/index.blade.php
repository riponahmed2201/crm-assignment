@extends('master')

@section('title', 'Research projects')
@section('page_title', 'Research projects')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('research-projects.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
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
                                    <th>Created At</th>
                                    <th>Action</th>
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
                                        <td>{{ $researchProject->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('research-projects.edit', $researchProject->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('research-projects.destroy', $researchProject->id) }}"
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
