@extends('master')

@section('title', 'Contact')

@isset($contact)
    @section('page_title', 'Edit contact')
@else
@section('page_title', 'Add contact')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-danger float-end"> <i class="bi-list"></i>
                Back to
                list</a>
        </div>
        <form class="row g-3 p-4" method="POST"
            action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}">
            @csrf
            @isset($contact)
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
                                        @isset($contact) {{ $user->id == $contact->user_id ? 'selected' : '' }} @endisset
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
                            <label for="academic_role" class="form-label">Academic Role <span
                                    class="text-danger">*</span></label>
                            <select id="academic_role" class="form-select" name="academic_role">
                                <option selected>Select Academic Role</option>
                                @foreach ($academicRoles as $academicRole)
                                    <option
                                        @isset($contact) {{ $academicRole->id == $contact->academic_role_id ? 'selected' : '' }} @endisset
                                        value="{{ $academicRole->id }}">{{ $academicRole->role_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('academic_role')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ isset($contact) ? $contact->name : old('name') }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="organization" class="form-label">Organization <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="organization"
                                placeholder="Enter organization"
                                value="{{ isset($contact) ? $contact->organization : old('organization') }}">
                            @error('organization')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ isset($contact) ? $contact->email : old('email') }}">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ isset($contact) ? $contact->phone : old('phone') }}">
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="notes" class="form-label">Notes <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="notes" placeholder="Enter notes">{{ isset($contact) ? $contact->notes : old('notes') }}</textarea>
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
