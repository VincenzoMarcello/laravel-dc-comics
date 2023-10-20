@extends('layouts.app')

@section('main-content')
  <div class="container text-light">
    <form action="{{ route('comics.update', $comic) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-6">
          <label for="thumb" class="form-label mt-4">Immagine</label>
          <input class="form-control" type="text" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>

        <div class="col-6">
          <label for="title" class="form-label mt-4">Titolo</label>
          <input class="form-control" type="text" id="title" name="title" value="{{ $comic->title }}">
        </div>


        <div class="col-6">
          <label for="price" class="form-label mt-4">Prezzo</label>
          <input class="form-control" type="text" id="price" name="price" value="{{ $comic->price }}">
        </div>

        <div class="col-6">
          <label for="series" class="form-label mt-4">Serie</label>
          <input class="form-control" type="text" id="series" name="series" value="{{ $comic->series }}">
        </div>

        <div class="col-6">
          <label for="sale_date" class="form-label mt-4">Data vendita</label>
          <input class="form-control" type="date" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
        </div>

        <div class="col-6">
          <label for="type" class="form-label mt-4">Tipo</label>
          <input class="form-control" type="text" id="type" name="type" value="{{ $comic->type }}">
        </div>

        <div class="col-12">
          <label for="description" class="form-label mt-4">Descrizione</label>
          <textarea class="form-control" id="description" name="description">{{ $comic->description }}
        </textarea>
        </div>
      </div>


      <button class="btn
            btn-success mt-5">Salva modifiche</button>
    </form>
  </div>
@endsection
