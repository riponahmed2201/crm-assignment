@extends('master')

@section('title', 'Financial trackers')

@isset($financialTracker)
    @section('page_title', 'Edit financial trackers')
@else
@section('page_title', 'Add financial trackers')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('financial-trackers.index') }}" class="btn btn-sm btn-danger float-end"> <i
                    class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($financialTracker) ? route('financial-trackers.update', $financialTracker->id) : route('financial-trackers.store') }}">
            @csrf
            @isset($financialTracker)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    @if (Auth::user()->role === 'admin')
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="user_name" class="form-label">User <span
                                        class="text-danger">*</span></label>
                                <select id="user_name" class="form-select" name="user_name">
                                    <option selected>Select User</option>
                                    @foreach ($users as $user)
                                        <option
                                            @isset($financialTracker) {{ $user->id == $financialTracker->user_id ? 'selected' : '' }} @endisset
                                            value="{{ $user->id }}">{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <select id="category" class="form-select" name="category">
                                <option selected>Select Category</option>
                                @foreach ($financialCategories as $financialCategory)
                                    <option
                                        @isset($financialTracker) {{ $financialCategory->id == $financialTracker->category_id ? 'selected' : '' }} @endisset
                                        value="{{ $financialCategory->id }}">{{ $financialCategory->category_name }}
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
                                value="{{ isset($financialTracker) ? $financialTracker->title : old('title') }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter amount"
                                value="{{ isset($financialTracker) ? $financialTracker->amount : old('amount') }}">
                            @error('amount')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="due_date" class="form-label">Due date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="due_date" placeholder="Enter due date"
                                value="{{ isset($financialTracker) ? $financialTracker->due_date : old('due_date') }}">
                            @error('due_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if (Auth::user()->role === 'admin')
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select id="status" class="form-select" name="status">
                                        <option selected>Select Status</option>

                                        @foreach ($statuses as $key => $status)
                                            <option
                                                @isset($financialTracker) {{ $financialTracker->status == $key ? 'selected' : '' }} @endisset
                                                value="{{ $key }}">{{ $status }}</option>
                                        @endforeach

                                    </select>
                                    @error('status')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
