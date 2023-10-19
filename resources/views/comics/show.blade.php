@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1 class="text-light">Dettaglio Comics</h1>
    <div class="row g-5">
      <div class="col-4">
        <img src="{{ $comic->thumb }}">
      </div>
      <div class="col-8 text-light">
        <p>{{ $comic->title }}</p>
        <p>{{ $comic->series }}</p>
        <p>{{ $comic->description }}</p>
        <p>{{ $comic->price }}</p>
      </div>
    </div>
    </div>
  </section>
@endsection
