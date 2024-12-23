@extends('master')

@section('title', 'Contacts')
@section('page_title', 'Contacts')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Academic Role Name</th>
                                    <th>Name</th>
                                    <th>Organization</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact?->user?->name }}</td>
                                        <td>{{ $contact?->academicRole?->role_name }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->organization }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact?->creator?->name }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('contacts.edit', $contact->id) }}"
                                                class="btn btn-sm btn-primary"> Edit</a>
                                            <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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
