@extends('master')

@section('title', 'Task')

@isset($task)
    @section('page_title', 'Edit task')
@else
@section('page_title', 'Add task')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
            @csrf
            @isset($task)
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
                                        @isset($task) {{ $user->id == $task->user_id ? 'selected' : '' }} @endisset
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
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <select id="category" class="form-select" name="category">
                                <option selected>Select Category</option>
                                @foreach ($taskCategories as $taskCategory)
                                    <option
                                        @isset($task) {{ $taskCategory->id == $task->category_id ? 'selected' : '' }} @endisset
                                        value="{{ $taskCategory->id }}">{{ $taskCategory->category_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                value="{{ isset($task) ? $task->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="due_date" class="form-label">Due date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="due_date" placeholder="Enter due date"
                                value="{{ isset($task) ? $task->due_date : old('due_date') }}">
                            @error('due_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="file" class="form-label">Upload File </label>

                                <input type="file" class="form-control" name="file">
                                @if (isset($task) && $task->file)
                                    <img src="{{ asset('storage/' . $task->file) }}" alt="Task File"
                                        class="img-thumbnail mt-2" style="width: 100px;">
                                @endif

                                @error('file')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select id="status" class="form-select" name="status">
                                    <option selected>Select Status</option>

                                    @foreach ($statuses as $key => $status)
                                        <option
                                            @isset($task) {{ $task->status == $key ? 'selected' : '' }} @endisset
                                            value="{{ $key }}">{{ $status }}</option>
                                    @endforeach

                                </select>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ isset($task) ? $task->description : old('description') }}</textarea>
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
