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
                                    @if (Auth::user()->role === 'admin')
                                        <th>Created By</th>
                                    @endif
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
                                        @if (Auth::user()->role === 'admin')
                                            <td>{{ $financialTracker?->creator?->name }}</td>
                                        @endif

                                        <td>{{ $financialTracker->created_at->diffForHumans() }}</td>

                                        <td>
                                            @if (Auth::user()->role === 'admin' || (Auth::user()->role === 'student' && $financialTracker->status === 'pending'))
                                                <a href="{{ route('financial-trackers.edit', $financialTracker->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Edit
                                                </a>
                                            @endif

                                            @if (Auth::user()->role == 'admin')
                                                <form
                                                    action="{{ route('financial-trackers.destroy', $financialTracker->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            @endif
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
