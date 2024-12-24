@extends('master')

@section('title', 'Notice Management')
@section('page_title', 'Notice Management')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Auth::user()->role === 'admin')
                        <div class="card-header">
                            <a href="{{ route('notices.create') }}" class="btn btn-sm btn-primary float-end">
                                <i class="bi-file-earmark-plus-fill"></i> Add New Notice
                            </a>
                        </div>
                    @endif
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Published At</th>
                                    <th>Expires At</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role === 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $notice)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $notice->title }}</td>
                                        <td>{{ ucfirst($notice->type) }}</td>
                                        <td>{{ ucfirst($notice->priority) }}</td>
                                        <td>{{ ucfirst($notice->status) }}</td>
                                        <td>{{ $notice->published_at ? $notice->published_at->format('Y-m-d H:i') : '-' }}
                                        </td>
                                        <td>{{ $notice->expires_at ? $notice->expires_at->format('Y-m-d H:i') : '-' }}</td>
                                        <td>{{ $notice?->creator?->name }}</td>
                                        <td>{{ $notice->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->role === 'admin')
                                            <td>
                                                <a href="{{ route('notices.edit', $notice->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this notice?')">
                                                        Delete
                                                    </button>
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
