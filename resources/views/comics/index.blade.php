@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>Lista Comics</h1>
    <a class="btn btn-success mb-3" href="{{ route('comics.create') }}">Aggiungi Comic</a>

    <div class="row g-5">
      @forelse ($comics as $comic)
        <div class="col-4">
          <div class="card text-center">
            <div class="card-header ">
              <img src="{{ $comic->thumb }}">
            </div>
            <div class="card-body">
              <p>{{ $comic->title }}</p>
              <p>{{ $comic->series }}</p>
              <p>{{ $comic->type }}</p>
              <p>{{ $comic->price }}</p>
              <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Dettagli</a>
              <a class="btn btn-success" href="{{ route('comics.edit', $comic) }}">Modifica</a>
            </div>
          </div>
        </div>
      @empty
        <h1>Non ci sono Comics</h1>
      @endforelse
    </div>
  </section>
@endsection
