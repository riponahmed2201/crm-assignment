@extends('master')

@section('title', 'Financial trackers')
@section('page_title', 'Financial trackers')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('financial-trackers.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($financialTrackers as $financialTracker)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $financialTracker?->user?->name }}</td>
                                        <td>{{ $financialTracker?->category?->category_name }}</td>
                                        <td>{{ $financialTracker->title }}</td>
                                        <td>{{ $financialTracker->amount }}</td>
                                        <td>{{ $financialTracker->due_date }}</td>
                                        <td>
                                            @if ($financialTracker->status == 'pending')
                                                <span
                                                    class="badge bg-warning">{{ $statuses[$financialTracker->status] }}</span>
                                            @else
                                                <span
                                                    class="badge bg-success">{{ $statuses[$financialTracker->status] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $financialTracker->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('financial-trackers.edit', $financialTracker->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit</a>
                                            <a href="{{ route('financial-trackers.destroy', $financialTracker->id) }}"
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