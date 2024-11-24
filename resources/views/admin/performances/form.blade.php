@extends('master')

@section('title', 'Performances')

@isset($performance)
    @section('page_title', 'Edit performances')
@else
@section('page_title', 'Add performances')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('performances.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($performance) ? route('performances.update', $performance->id) : route('performances.store') }}">
            @csrf
            @isset($performance)
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
                                        @isset($performance) {{ $user->id == $performance->user_id ? 'selected' : '' }} @endisset
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
                            <label for="category" class="form-label">Task <span class="text-danger">*</span></label>
                            <select id="task" class="form-select" name="task">
                                <option selected>Select Task</option>
                                @foreach ($tasks as $task)
                                    <option
                                        @isset($performance) {{ $task->id == $performance->task_id ? 'selected' : '' }} @endisset
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
                            <label for="grade" class="form-label">Grade <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="grade" placeholder="Enter grade"
                                value="{{ isset($performance) ? $performance->grade : old('grade') }}">
                            @error('grade')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="completion_percentage" class="form-label">Completion Percentage <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="completion_percentage"
                                placeholder="Enter completion percentage"
                                value="{{ isset($performance) ? $performance->completion_percentage : old('completion_percentage') }}">
                            @error('completion_percentage')
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
