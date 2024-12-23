@extends('master')

@section('title', 'Custom notes')
@section('page_title', 'Custom notes')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Auth::user()->role === 'admin')
                        <div class="card-header">
                            <a href="{{ route('custom-notes.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                    class="bi-file-earmark-plus-fill"></i> Add New</a>
                        </div>
                    @endif
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Tags</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role === 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customNotes as $customNote)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customNote?->user?->name }}</td>
                                        <td>{{ $customNote->title }}</td>
                                        <td>{{ $customNote->content }}</td>
                                        <td>{{ $customNote->tags }}</td>
                                        <td>{{ $customNote?->creator?->name }}</td>
                                        <td>{{ $customNote->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->role === 'admin')
                                            <td>
                                                <a href="{{ route('custom-notes.edit', $customNote->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>

                                                <form action="{{ route('custom-notes.destroy', $customNote->id) }}"
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
