@extends('layouts.app')

@section('title', "Type " . $type->id)

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante ritorna alla lista --}}
            <a href="{{ route('admin.types.index')}}" class="btn btn-primary"> Return to list</a>
            
            {{-- pulsante modifica progetto --}}
            <a href="{{ route('admin.types.edit', $type)}}" class="btn btn-warning"> Edit Type</a>

            <h2 class="mt-3">Type info</h2>

            <div class="card my-4">
                <div class="card-body">
                    <h2><span class="badge" style="background-color: {{ $type->color }}"> {{ $type->id }} - {{ $type->label }}</span></h2>
                </div>
            </div>
        </div>
    </section>
@endsection