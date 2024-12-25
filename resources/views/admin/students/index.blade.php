@extends('master')

@section('title', 'Student Management')
@section('page_title', 'Student List')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('students.create') }}" class="btn btn-sm btn-primary float-end">
                            <i class="bi-file-earmark-plus-fill"></i> Add New Student
                        </a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Batch</th>
                                    <th>Program</th>
                                    <th>Student ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->department }}</td>
                                        <td>{{ $student->batch }}</td>
                                        <td>{{ $student->program }}</td>
                                        <td>{{ $student->student_id }}</td>
                                        <td>{{ ucfirst($student->status) }}</td>
                                        <td>
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                    Delete
                                                </button>
                                            </form>
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
