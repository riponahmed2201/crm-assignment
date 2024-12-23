@extends('master')

@section('title', 'Documents')
@section('page_title', 'Documents')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('documents.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>File Path</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $document?->user?->name }}</td>
                                        <td>{{ $document?->title }}</td>
                                        <td>{{ $document->tags }}</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ asset('uploads/documents/' . $document->file_path) }}">{{ $document->file_path }}</a>
                                        </td>
                                        <td>{{ $document?->creator?->name }}</td>
                                        <td>{{ $document->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('documents.edit', $document->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <form action="{{ route('documents.destroy', $document->id) }}"
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
