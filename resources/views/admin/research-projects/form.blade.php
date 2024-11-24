@extends('master')

@section('title', 'Research projects')

@isset($researchProject)
    @section('page_title', 'Edit research projects')
@else
@section('page_title', 'Add research projects')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('research-projects.index') }}" class="btn btn-sm btn-danger float-end"> <i
                    class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($researchProject) ? route('research-projects.update', $researchProject->id) : route('research-projects.store') }}">
            @csrf
            @isset($researchProject)
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
                                        @isset($researchProject) {{ $user->id == $researchProject->user_id ? 'selected' : '' }} @endisset
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
                            <label for="task" class="form-label">Task <span class="text-danger">*</span></label>
                            <select id="task" class="form-select" name="task">
                                <option selected>Select Task</option>
                                @foreach ($tasks as $task)
                                    <option
                                        @isset($researchProject) {{ $task->id == $researchProject->task_id ? 'selected' : '' }} @endisset
                                        value="{{ $task->id }}">{{ $task->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('task')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                value="{{ isset($researchProject) ? $researchProject->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select id="status" class="form-select" name="status">
                                    <option selected>Select Status</option>

                                    @foreach ($statuses as $key => $statusItem)
                                        <option
                                            @isset($researchProject) {{ $researchProject->status == $key ? 'selected' : '' }} @endisset
                                            value="{{ $key }}">{{ $statusItem }}</option>
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
                            <textarea class="form-control" name="description" placeholder="Enter description">{{ isset($researchProject) ? $researchProject->description : old('description') }}</textarea>
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
