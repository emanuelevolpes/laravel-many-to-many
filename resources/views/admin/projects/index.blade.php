@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-4">
            <h2>Projects list</h2>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-primary">Create new project</a>
        </div>

        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>
                            @if ($project->type_id)
                                {{ $project->type->name }}
                            @else
                            Edit and choose a type
                            @endif
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a
                                    href="{{ route('admin.projects.show', $project) }}"class="btn btn-sm btn-success">Show</a>
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $project->id }}" onclick="event.stopPropagation()">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="delete{{ $project->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>DELETE PROJECT: {{ $project->title }}</div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
