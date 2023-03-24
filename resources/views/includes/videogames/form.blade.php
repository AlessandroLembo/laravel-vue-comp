@if ($videogame->exists)
    <form action="{{ route('admin.videogames.update', $videogame->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')

        <h3>Modifica dati videogame</h3>
        @csrf
    @else
        <form action="{{ route('admin.videogames.store') }}" method="POST" enctype="multipart/form-data">
            <h3>Aggiungi nuovo videogame</h3>
            @csrf
@endif
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control bg-dark text-light" id="title" name="title"
                    value="{{ old('title', $videogame->title) }}" required minlength="5" maxlength="50">
                <small class="text-muted">Inserisci il nome del progetto</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control bg-dark text-light" id="image" name="image"
                    value="{{ old('image', $videogame->image) }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step=".01" class="form-control bg-dark text-light" id="price" name="price"
                    value="{{ old('price', $videogame->price) }}">
                <small class="text-muted">Inserisci prezzo</small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di Pubblicazione</label>
                <input type="date" class="form-control bg-dark text-light" id="sale_date" name="sale_date"
                    value="{{ old('sale_date', $videogame->sale_date) }}">
                <small class="text-muted">Inserisci data di pubblicazione</small>
            </div>
        </div>

    </div>
    <div class="row">
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control bg-dark text-light" id="description" name="description" rows="15" required>{{ old('description', $videogame->description) }}</textarea>
            </div>
        </div>
    </div>
</div>
<footer class="my-4">
    <div class="text-center">
        <a href="{{ route('admin.videogames.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me2"></i>
            Indietro</a>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-floppy-disk me-2"></i>
            Salva
        </button>
    </div>
</footer>
</form>
