@extends('master')

@section('title', 'Document')

@isset($document)
    @section('page_title', 'Edit document')
@else
@section('page_title', 'Add document')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('documents.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST" enctype="multipart/form-data"
            action="{{ isset($document) ? route('documents.update', $document->id) : route('documents.store') }}">
            @csrf
            @isset($document)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="user" class="form-label">User <span class="text-danger">*</span></label>
                            <select id="user" class="form-select" name="user">
                                <option selected>Select User</option>
                                @foreach ($users as $user)
                                    <option
                                        @isset($document) {{ $user->id == $document->user_id ? 'selected' : '' }} @endisset
                                        value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                value="{{ isset($document) ? $document->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="file_path" class="form-label">File <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control" name="file_path">
                            @error('file_path')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @isset($document->file_path)
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="file_path" class="form-label">View File
                                </label> <br>
                                <a target="_blank"
                                    href="{{ asset('uploads/documents/' . $document->file_path) }}">{{ $document->file_path }}</a>
                            </div>
                        </div>
                    @endisset

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="tags" placeholder="Enter tags">{{ isset($document) ? $document->tags : old('tags') }}</textarea>
                            @error('tags')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
