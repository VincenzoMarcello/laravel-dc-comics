@extends('layouts.app')

@section('main-content')
  <div class="container text-light">
    <form action="{{ route('comics.update', $comic) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row g-3">
        <div class="col-6">
          <label for="thumb" class="form-label mt-4">Immagine</label>
          <input class="form-control @error('thumb') is-invalid @enderror" type="text" id="thumb" name="thumb"
            value="{{ old('thumb') ?? $comic->thumb }}">

          @error('thumb')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-6">
          <label for="title" class="form-label mt-4">Titolo</label>
          <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title"
            value="{{ old('title') ?? $comic->title }}">

          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        <div class="col-6">
          <label for="price" class="form-label mt-4">Prezzo</label>
          <input class="form-control @error('price') is-invalid @enderror" type="text" id="price" name="price"
            value="{{ old('price') ?? $comic->price }}">

          @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-6">
          <label for="series" class="form-label mt-4">Serie</label>
          <input class="form-control @error('series') is-invalid @enderror" type="text" id="series" name="series"
            value="{{ old('series') ?? $comic->series }}">

          @error('comic')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-6">
          <label for="sale_date" class="form-label mt-4">Data vendita</label>
          <input class="form-control @error('sale_date') is-invalid @enderror" type="date" id="sale_date"
            name="sale_date" value="{{ old('sale_date') ?? $comic->sale_date }}">

          @error('sale_date')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-6">
          <label for="type" class="form-label mt-4">Tipo</label>
          <input class="form-control @error('type') is-invalid @enderror" type="text" id="type" name="type"
            value="{{ old('type') ?? $comic->type }}">

          @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label for="description" class="form-label mt-4">Descrizione</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') ?? $comic->description }}
        </textarea>

          @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>


      <button class="btn
            btn-success mt-5">Salva modifiche</button>
    </form>
  </div>
@endsection
