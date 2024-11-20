@extends('master')

@section('title', 'Academic roles')

@isset($academicRole)
    @section('page_title', 'Edit academic roles')
@else
@section('page_title', 'Add academic roles')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('academic-roles.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($academicRole) ? route('academic-roles.update', $academicRole->id) : route('academic-roles.store') }}">
            @csrf
            @isset($academicRole)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="role_name" class="form-label">Role Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="role_name" placeholder="Enter name"
                                value="{{ isset($academicRole) ? $academicRole->role_name : old('role_name') }}">
                            @error('role_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ isset($academicRole) ? $academicRole->description : old('description') }}</textarea>
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
