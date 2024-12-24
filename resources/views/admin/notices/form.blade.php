@extends('master')

@section('title', 'Notice Management')

@isset($notice)
    @section('page_title', 'Edit Notice')
@else
@section('page_title', 'Add Notice')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('notices.index') }}" class="btn btn-sm btn-danger float-end">
                <i class="bi-list"></i> Back to list
            </a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($notice) ? route('notices.update', $notice->id) : route('notices.store') }}">
            @csrf
            @isset($notice)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                value="{{ isset($notice) ? $notice->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select id="type" class="form-select" name="type">
                                <option selected>Select Type</option>
                                <option value="general"
                                    {{ isset($notice) && $notice->type == 'general' ? 'selected' : '' }}>General
                                </option>
                                <option value="urgent"
                                    {{ isset($notice) && $notice->type == 'urgent' ? 'selected' : '' }}>Urgent</option>
                                <option value="info"
                                    {{ isset($notice) && $notice->type == 'info' ? 'selected' : '' }}>Info</option>
                            </select>
                            @error('type')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
                            <select id="priority" class="form-select" name="priority">
                                <option selected>Select Priority</option>
                                <option value="low"
                                    {{ isset($notice) && $notice->priority == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium"
                                    {{ isset($notice) && $notice->priority == 'medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="high"
                                    {{ isset($notice) && $notice->priority == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('priority')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="published_at" class="form-label">Published At</label>
                            <input type="datetime-local" class="form-control" name="published_at"
                                value="{{ isset($notice) ? $notice->formatted_published_at : old('published_at') }}">
                            @error('published_at')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="expires_at" class="form-label">Expires At</label>
                            <input type="datetime-local" class="form-control" name="expires_at"
                                value="{{ isset($notice) ? $notice->formatted_expires_at : old('expires_at') }}">
                            @error('expires_at')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select id="status" class="form-select" name="status">
                                <option selected>Select Status</option>
                                <option value="draft"
                                    {{ isset($notice) && $notice->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published"
                                    {{ isset($notice) && $notice->status == 'published' ? 'selected' : '' }}>Published
                                </option>
                                <option value="archived"
                                    {{ isset($notice) && $notice->status == 'archived' ? 'selected' : '' }}>Archived
                                </option>
                            </select>
                            @error('status')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ isset($notice) ? $notice->description : old('description') }}</textarea>
                            @error('description')
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
