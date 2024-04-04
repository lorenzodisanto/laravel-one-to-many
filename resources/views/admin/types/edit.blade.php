@extends('layouts.app')

@section('title', "Edit Type ")

@section('content')
  <section>
     <div class="container my-4">

        {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.types.index')}}" class="btn btn-primary"> Return to list</a>

      {{-- pulsante torna al dettaglio --}}
      <a href="{{ route('admin.types.show', $type)}}" class="btn btn-info">Info</a>


      <h2 class="mt-3">Edit Type</h2>

      {{-- form aggiungi nuovo type --}}
      <form action="{{ route('admin.types.update', $type) }}" method="POST" class="row">
        @csrf

        {{-- aggiungo modificatore --}}
        @method("PATCH")

        <div class="col-11">
          <label for="label" class="form-label pt-3">Label</label>
          <input class="form-control" type="text" id="label" name="label" value="{{ old('label') ?? $type->label}}">
        </div>
        <div class="col-1">
            <label for="color" class="form-label pt-3">Color</label>
            <input class="form-control form-control-color" type="color" id="color" name="color" value="{{ old('color') ?? $type->color}}">
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-warning mt-3">Edit</button>
        </div>
       </form>
     </div>
    </section>
  @endsection