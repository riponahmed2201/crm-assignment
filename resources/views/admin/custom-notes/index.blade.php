@extends('master')

@section('title', 'Custom notes')
@section('page_title', 'Custom notes')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('custom-notes.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Tags</th>
                                    <th>Created At</th>
                                    <th>Action</th>
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
                                        <td>{{ $customNote->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('custom-notes.edit', $customNote->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('custom-notes.destroy', $customNote->id) }}"
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
