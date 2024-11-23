@extends('master')

@section('title', 'Calendar event')

@isset($calendarEvent)
    @section('page_title', 'Edit calendar event')
@else
@section('page_title', 'Add calendar event')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('calendar-events.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($calendarEvent) ? route('calendar-events.update', $calendarEvent->id) : route('calendar-events.store') }}">
            @csrf
            @isset($calendarEvent)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="user_name" class="form-label">User <span class="text-danger">*</span></label>
                            <select id="user_name" class="form-select" name="user_name">
                                <option selected>Select User Name</option>
                                @foreach ($users as $user)
                                    <option
                                        @isset($calendarEvent) {{ $user->id == $calendarEvent->user_id ? 'selected' : '' }} @endisset
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
                                        @isset($calendarEvent) {{ $task->id == $calendarEvent->task_id ? 'selected' : '' }} @endisset
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
                                value="{{ isset($calendarEvent) ? $calendarEvent->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="event_date" class="form-label">Event date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="event_date" placeholder="Enter due date"
                                value="{{ isset($calendarEvent) ? $calendarEvent->event_date : old('event_date') }}">
                            @error('event_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="reminder" class="form-label">Reminder <span
                                        class="text-danger">*</span></label>
                                <select id="reminder" class="form-select" name="reminder">
                                    <option selected>Select Reminder</option>

                                    <option
                                        @isset($calendarEvent) {{ $calendarEvent->reminder == 1 ? 'selected' : '' }} @endisset
                                        value="1">Yes</option>

                                    <option
                                        @isset($calendarEvent) {{ $calendarEvent->reminder == 0 ? 'selected' : '' }} @endisset
                                        value="0">No</option>

                                </select>
                                @error('reminder')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
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
