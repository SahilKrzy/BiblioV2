@extends('../welcome')

@section('content')

<div class="container">
    <h1 class="my-4">Editar Libro</h1>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{ $book->id }}" required>
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="form-group">
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="form-group">
            <label for="image_url">URL de la imagen:</label>
            <input type="text" id="image_url" name="image_url" class="form-control" value="{{ $book->image_url }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="categories">Categorías:</label>
            <select id="categories" name="categories[]" multiple class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category->contains($category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <textarea id="price" name="price" class="form-control" required>{{ $book->price }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <br>
        <br>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection