@extends('master')

@section('title', 'Calendar events')
@section('page_title', 'Calendar events')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('calendar-events.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Task Name</th>
                                    <th>Title</th>
                                    <th>Event Date</th>
                                    <th>Reminder</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calendarEvents as $calendarEvent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $calendarEvent?->user?->name }}</td>
                                        <td>{{ $calendarEvent?->task?->title }}</td>
                                        <td>{{ $calendarEvent->title }}</td>
                                        <td>{{ $calendarEvent->event_date }}</td>
                                        <td>
                                            @if ($calendarEvent->reminder)
                                                <span class="badge bg-info">Yes</span>
                                            @else
                                                <span class="badge bg-warning">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $calendarEvent->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('calendar-events.edit', $calendarEvent->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('calendar-events.destroy', $calendarEvent->id) }}"
                                                class="btn btn-sm btn-danger">
                                                Delete</a>
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