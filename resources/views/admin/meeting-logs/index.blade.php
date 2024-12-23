@extends('master')

@section('title', 'Meeting logs')
@section('page_title', 'Meeting logs')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @if (Auth::user()->role == 'admin')
                        <div class="card-header">
                            <a href="{{ route('meeting-logs.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                    class="bi-file-earmark-plus-fill"></i> Add New</a>
                        </div>
                    @endif

                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Contact</th>
                                    <th>Meeting Date</th>
                                    <th>Follow Date</th>
                                    <th>File</th>
                                    <th>notes</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetingLogs as $meetingLog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $meetingLog?->user?->name }}</td>
                                        <td>{{ $meetingLog?->contact?->name }}</td>
                                        <td>{{ $meetingLog->meeting_date }}</td>
                                        <td>{{ $meetingLog->follow_up_date }}</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ asset('uploads/meeting-logs/' . $meetingLog->file) }}">{{ $meetingLog->file }}</a>
                                        </td>
                                        <td>{{ $meetingLog->notes }}</td>
                                        <td>{{ $meetingLog?->creator?->name }}</td>
                                        <td>{{ $meetingLog->created_at->diffForHumans() }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <a href="{{ route('meeting-logs.edit', $meetingLog->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit</a>
                                                <form action="{{ route('meeting-logs.destroy', $meetingLog->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        @endif
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
