@extends('master')

@section('title', 'Networking logs')
@section('page_title', 'Networking logs')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('networking-logs.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Contact</th>
                                    <th>Meeting Date</th>
                                    <th>Follow Date</th>
                                    <th>notes</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($networkingLogs as $networkingLog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $networkingLog?->user?->name }}</td>
                                        <td>{{ $networkingLog?->contact?->name }}</td>
                                        <td>{{ $networkingLog->meeting_date }}</td>
                                        <td>{{ $networkingLog->follow_up_date }}</td>
                                        <td>{{ $networkingLog->notes }}</td>
                                        <td>{{ $networkingLog->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('networking-logs.edit', $networkingLog->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('networking-logs.destroy', $networkingLog->id) }}"
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
