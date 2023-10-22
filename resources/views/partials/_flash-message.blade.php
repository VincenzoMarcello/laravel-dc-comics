{{-- ! IN ComicController CI GESTIAMO LA CLASSE DA METTERE IN "alert-" --}}
<div class="container mt-5 pb-0">
  @if (session('message'))
    <div class="alert alert-{{ session('message_type') }}">
      {{ session('message') }}
    </div>
  @endif
</div>
