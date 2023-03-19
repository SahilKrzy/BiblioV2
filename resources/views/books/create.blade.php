@extends('../welcome')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-5" style="font-size: 40px;">Agregar Libro</h1>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Autor:</label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image_url">URL de la imagen:</label>
                    <input type="text" id="image_url" name="image_url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categories">Categorías: (Ctrl + click para selección multiple)</label>
                    <select id="categories" name="categories[]" class="form-control" multiple required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Precio:</label>
                    <textarea id="price" name="price" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <br>
                <br>
                <a class="btn btn-secondary" href="{{ route('books.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection