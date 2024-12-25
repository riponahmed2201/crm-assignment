@extends('master')

@section('title', 'Student Management')

@isset($student)
    @section('page_title', 'Edit Student')
@else
@section('page_title', 'Add Student')
@endisset

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('students.index') }}" class="btn btn-sm btn-danger float-end">
                <i class="bi-list"></i> Back to list
            </a>
        </div>
        <form class="row g-3 p-4" method="POST" enctype="multipart/form-data"
            action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}">
            @csrf
            @isset($student)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="row">

                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name', $student->name ?? '') }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ old('email', $student->email ?? '') }}">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number"
                                value="{{ old('phone', $student->phone ?? '') }}">
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Department -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="department" class="form-label">Department <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="department" placeholder="Enter department"
                                value="{{ old('department', $student->department ?? '') }}">
                            @error('department')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Batch -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="batch" class="form-label">Batch <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="batch" placeholder="Enter batch"
                                value="{{ old('batch', $student->batch ?? '') }}">
                            @error('batch')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Program -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="program" class="form-label">Program <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="program" placeholder="Enter program"
                                value="{{ old('program', $student->program ?? '') }}">
                            @error('program')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Student ID -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="student_id" class="form-label">Student ID <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="student_id" placeholder="Enter student ID"
                                value="{{ old('student_id', $student->student_id ?? '') }}">
                            @error('student_id')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Profile Picture -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" name="profile_picture">
                            @if (isset($student) && $student->profile_picture)
                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture"
                                    class="img-thumbnail mt-2" style="width: 100px;">
                            @endif
                            @error('profile_picture')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth"
                                value="{{ old('date_of_birth', $student->date_of_birth ?? '') }}">
                            @error('date_of_birth')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter address"
                                value="{{ old('address', $student->address ?? '') }}">
                            @error('address')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select id="status" class="form-select" name="status">
                                <option value="active"
                                    {{ old('status', $student->status ?? '') == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive"
                                    {{ old('status', $student->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
