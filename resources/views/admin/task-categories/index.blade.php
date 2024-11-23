@extends('master')

@section('title', 'Task categories')
@section('page_title', 'Task categories')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('task-categories.create') }}" class="btn btn-sm btn-primary float-end"> <i
                                class="bi-file-earmark-plus-fill"></i> Add New</a>
                    </div>
                    <div class="card-body mt-2">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taskCategories as $taskCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $taskCategory->category_name }}</td>
                                        <td>{{ $taskCategory->description }}</td>
                                        <td>{{ $taskCategory->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('task-categories.edit', $taskCategory->id) }}"
                                                class="btn btn-sm btn-primary"> Edit</a>
                                            <a href="{{ route('task-categories.destroy', $taskCategory->id) }}"
                                                class="btn btn-sm btn-danger"> Delete</a>
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
