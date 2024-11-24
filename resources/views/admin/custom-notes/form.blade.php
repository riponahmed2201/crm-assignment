@extends('master')

@section('title', 'Custom notes')

@isset($customNote)
    @section('page_title', 'Edit custom notes')
@else
@section('page_title', 'Add custom notes')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('custom-notes.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($customNote) ? route('custom-notes.update', $customNote->id) : route('custom-notes.store') }}">
            @csrf
            @isset($customNote)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="user_name" class="form-label">User <span class="text-danger">*</span></label>
                            <select id="user_name" class="form-select" name="user_name">
                                <option selected>Select User</option>
                                @foreach ($users as $user)
                                    <option
                                        @isset($customNote) {{ $user->id == $customNote->user_id ? 'selected' : '' }} @endisset
                                        value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                value="{{ isset($customNote) ? $customNote->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="content" placeholder="Enter content">{{ isset($customNote) ? $customNote->content : old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="tags" placeholder="Enter tags(Ai,ML)">{{ isset($customNote) ? $customNote->tags : old('tags') }}</textarea>
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
