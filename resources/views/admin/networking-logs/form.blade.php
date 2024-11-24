@extends('master')

@section('title', 'Networking logs')

@isset($networkingLog)
    @section('page_title', 'Edit networking logs')
@else
@section('page_title', 'Add networking logs')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('networking-logs.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($networkingLog) ? route('networking-logs.update', $networkingLog->id) : route('networking-logs.store') }}">
            @csrf
            @isset($networkingLog)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="user" class="form-label">User <span class="text-danger">*</span></label>
                            <select id="user" class="form-select" name="user">
                                <option selected>Select User</option>
                                @foreach ($users as $user)
                                    <option
                                        @isset($networkingLog) {{ $user->id == $networkingLog->user_id ? 'selected' : '' }} @endisset
                                        value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="contact" class="form-label">Contact <span class="text-danger">*</span></label>
                            <select id="contact" class="form-select" name="contact">
                                <option selected>Select contact</option>
                                @foreach ($contacts as $contact)
                                    <option
                                        @isset($networkingLog) {{ $contact->id == $networkingLog->contact_id ? 'selected' : '' }} @endisset
                                        value="{{ $contact->id }}">{{ $contact->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contact')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="meeting_date" class="form-label">Meeting date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="meeting_date" placeholder="Enter due date"
                                value="{{ isset($networkingLog) ? $networkingLog->meeting_date : old('meeting_date') }}">
                            @error('meeting_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="follow_up_date" class="form-label">Follow up date <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="follow_up_date"
                                placeholder="Enter due date"
                                value="{{ isset($networkingLog) ? $networkingLog->follow_up_date : old('follow_up_date') }}">
                            @error('follow_up_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="notes" class="form-label">Notes <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" placeholder="Enter notes">{{ isset($networkingLog) ? $networkingLog->notes : old('notes') }}</textarea>
                            @error('notes')
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
