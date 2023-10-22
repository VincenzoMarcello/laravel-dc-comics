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


              <div class="d-flex justify-content-center">
                {{-- # PULSANTE DETTAGLI QUINDI SHOW --}}
                <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary mx-1">Dettagli</a>

                {{-- # PULSANTE MODIFICA QUINDI CREATE --}}
                <a href="{{ route('comics.edit', $comic) }}" class="btn btn-success mx-1">Modifica</a>

                {{-- # QUI ABBIAMO IL FORM BASE CON IL PULSANTE CHE ELIMINA UN'ELEMENTO
                # COMIC ED E' IMPORTANTE METTERE IL METODO POST CHE POI CAMBIERA' IN METODO
                # DELETE PERCHE' SE NON LO METTIAMO PRENDERA' IN AUTOMATICO IL METODO GET
                # E NON VA BENE --}}
                {{-- <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger mx-1">Elimina</button>
                </form> --}}

                {{-- # PER EVITARE DI CANCELLARE UNA COSA PER SBAGLIO POSSIAMO FAR COMPARIRE
                  # UN POP UP CHE CHIEDE CONFERMA DELLA CANCELLAZIONE QUESTO SI FA
                  # ATTRAVERSO LE MODAL, VEDIAMO COME SI FA' --}}

                {{-- ! FAI ATTENZIONE CHE NELL'ATTRIBUTO data-bs-target CI VUOLE IL "#" --}}
                {{-- ! MENTRE SOTTO NELL'ID DELLE MODAL NON CI VUOLE --}}
                <a href="#" type="button" class="btn btn-danger mx-1" data-bs-toggle="modal"
                  data-bs-target="#delete-modal-{{ $comic->id }}">
                  Elimina
                </a>
                {{-- ! MODAL PRESA DA BOOTSTRAP --}}
                <div class="modal fade" id="delete-modal-{{ $comic->id }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Elemento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Sei sicuro di voler eliminare definitivamente il Comic: <h6>{{ $comic->title }}?</h6>
                      </div>
                      <div class="modal-footer">
                        {{-- ! QUI ABBIAMO I DUE TASTI DELLA MODAL --}}
                        {{-- ! IL PRIMO RIMANE COSI' COM'E' PER CHIUDERE SEMPLICEMENTE LA MODAL --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                        {{-- ! NEL SECONDO METTIAMO IL FORM BASE DI CANCELLAZIONE AL POSTO DEL SINGOLO TASTO --}}
                        <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-primary">Elimina</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      @empty
        <h1>Non ci sono Comics</h1>
      @endforelse
    </div>
  </section>
@endsection
