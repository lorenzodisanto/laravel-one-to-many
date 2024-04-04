@extends('layouts.app')

@section('title', "Project " . $project->id)


@section('content')
    <section>
        <div class="container my-4">

            {{-- pulsante ritorna alla lista --}}
            <a href="{{ route('admin.projects.index')}}" class="btn btn-primary"> Return to list</a>
            
            {{-- pulsante modifica progetto --}}
            <a href="{{ route('admin.projects.edit', $project)}}" class="btn btn-warning"> Edit Project</a>

            <div class="card my-4">
                <div class="card-body">
                    <h2>{{ $project->id }} - {{ $project->title }}</h2>
                    <code>{{ $project->slug }}</code>
                    <p class="fs-5">{{ $project->description }}</p>
                    <a href="{{ $project->link }}">link</a>
                </div>
                
            </div>
            
        </div>
    </section>
@endsection
