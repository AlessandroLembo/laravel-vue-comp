@extends('layouts.app')

@section('title','Videogame-details')

@section('content')
<section id="videogame">
    <div class="container">
        <div class="card mt-5">
          <div class="card-body text-center">
              <h1 class="card-title">Videogame {{ $videogame->title }}</h1>
              <p class="card-text">{{ $videogame->description }}</p>
              <p class="card-text"><b>Prezzo:</b> €{{ $videogame->price }}</p>
          </div>
          <figure class="text-center">
              <img src="{{ asset('storage/' . $videogame->image) }}" class="card-img-bottom img-fluid w-50" alt="{{ $videogame->title }}">
          </figure>

        </div>
        <div class="w-100 d-flex justify-content-center align-items-center py-3 gap-3">
            <a href="{{ route('admin.videogames.index') }}" class="btn btn-primary"><i class="fas fa-pencil me-2"></i>Indietro</a>
            <a href="{{ route('admin.videogames.edit', $videogame->id) }}" class="btn btn-warning"><i class="fa-solid fa-arrow-up me-2"></i>Modifica</a>
            <form action="{{ route('admin.videogames.destroy', $videogame->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
</section>
@endsection