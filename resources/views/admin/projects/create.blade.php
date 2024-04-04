@extends('layouts.app')

@section('title', "New Project ")

@section('content')
  <section>
     <div class="container my-4">
      
      {{-- errore di validazione generale
      @if ($errors->any())
        <div class="alert alert-danger">
          <h4>Correggi i seguenti errori per proseguire: </h4>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif --}}

        {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.projects.index')}}" class="btn btn-primary"> Return to list</a>

      <h2 class="mt-3">Add Project</h2>
        
      {{-- form aggiungi nuovo progetto --}}
      <form action="{{ route('admin.projects.store') }}" method="POST" class="row">
        @csrf

        <div class="col-6">
            <label for="title" class="form-label pt-3">Title</label>
            <input type="text" 
              class="form-control @error('title') is-invalid
              @enderror"
              id="title" 
              name="title" 
              value="{{ old('title') }}"
            />
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-6">
            <label for="link" class="form-label pt-3">Link</label>
            <input type="text" 
              class="form-control @error('link') is-invalid
              @enderror" 
              id="link" 
              name="link" 
              value="{{ old('link') }}"
            />
            @error('link')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="description" class="form-label pt-3">Description</label>
            <textarea
                class="form-control @error('description') is-invalid
                @enderror"
                id="description"
                name="description"
                value="{{ old('description') }}"
                rows="5"
            ></textarea>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </div>
       </form>
     </div>
  </section>
@endsection
