@extends('master')

@section('title', 'Task categories')

@isset($taskCategory)
    @section('page_title', 'Edit task categories')
@else
@section('page_title', 'Add task categories')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('task-categories.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($taskCategory) ? route('task-categories.update', $taskCategory->id) : route('task-categories.store') }}">
            @csrf
            @isset($taskCategory)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="category_name" class="form-label">Category Name <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="category_name" placeholder="Enter name"
                                value="{{ isset($taskCategory) ? $taskCategory->category_name : old('category_name') }}">
                            @error('category_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ isset($taskCategory) ? $taskCategory->description : old('description') }}</textarea>
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
