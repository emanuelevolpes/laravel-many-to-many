@extends('layouts.app')

@section('content')
    <div class="container p-3 ">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="development_date" class="form-label">Development date</label>
                <input type="text" class="form-control" @error('development_date') is-invalid @enderror
                    id="development_date" name="development_date" value="{{ old('development_date') }}">
                @error('development_date')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_link" class="form-label">Project link</label>
                <input type="text" class="form-control" @error('project_link') is-invalid @enderror id="project_link"
                    name="project_link" value="{{ old('project_link') }}">
                @error('project_link')
                    <div class="alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
