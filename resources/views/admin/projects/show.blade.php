@extends('layouts.app')

@section('content')
    <div class="container text-center p-3">
        <h1>{{ $project->title }}</h1>
        <div><img src="{{ asset('storage/' . $project->image)}}" alt="{{ $project->title }}" style="width: 200px"></div>
        @if ($project->type_id)
            <h2>Type: {{ $project->type->name }}</h2>
        @endif
        <p>{{ $project->description }}</p>
    </div>
@endsection
