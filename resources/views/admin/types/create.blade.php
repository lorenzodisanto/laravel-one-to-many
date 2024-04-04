@extends('layouts.app')

@section('title', "New Type ")

@section('content')
  <section>
     <div class="container my-4">

        {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.types.index')}}" class="btn btn-primary"> Return to list</a>

      <h2 class="mt-3">Add Type</h2>

      {{-- form aggiungi nuovo type --}}
      <form action="{{ route('admin.types.store') }}" method="POST" class="row">
        @csrf

        <div class="col-11">
          <label for="label" class="form-label pt-3">Label</label>
          <input class="form-control" type="text" id="label" name="label">
       </div>
        <div class="col-1">
            <label for="color" class="form-label pt-3">Color</label>
            <input class="form-control form-control-color" type="color" id="color" name="color">
        </div>
  
        <div class="col-2">
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </div>
       </form>
     </div>
    </section>
  @endsection