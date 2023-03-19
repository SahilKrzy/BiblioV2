@extends('../welcome')
@section('content')
<br>
<div class="container">
    <center>
        <h1 style="font-size: 40px;">Libros</h1>
    </center>
    <a class="btn btn-primary" href="{{ route('books.create') }}">Agregar Libro</a>
    <form class="mt-3 mb-3" action="{{ route('books.index') }}" method="get">
        <div class="row">
            <div class="col-md-6">
                <label for="category">Filter by category:</label>
                <select class="form-select" name="category" id="category">
                    <option value="">All</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $selectedCategory) selected @endif>
                        {{ $category->id }} - {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
            <br><br>
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" placeholder="Buscar" class="form-control" name="search" id="search" value="{{ $search }}">
                    <span style="width: 5px;"></span>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Category</th>
                <th>Descripcion</th>
                <th>Acciones</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($books)
            @foreach($books as $book)
            <tr>
                <td>
                    <p>{{ $book->id }}</p>
                </td>
                <td>
                    <p>{{ $book->title }}</p>
                </td>
                <td>
                    <p>{{ $book->author }}</p>
                </td>
                <td>
                    <p>
                        @foreach($book->category as $category)
                    <p>{{ $category->name }}</p>
                    @endforeach
                    </p>
                </td>
                <td>
                    <p>{{ $book->description }}</p>
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('books.show', ['id' => $book->id]) }}">Ver</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('books.edit', ['id' => $book->id]) }}">Editar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="{{ route('books.confirm-delete', ['id' => $book->id]) }}">Eliminar</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">No se encontraron libros en la categoría seleccionada</td>
            </tr>
            @endif
        </tbody>
    </table>
    <!-- Agregar la paginación -->
    <style>
        div.pagination svg {
            width: 10px;
            height: 10px;
        }
    </style>
    <center>
        <div class="pagination">
            {{ $books->links() }}
        </div>
    </center>
</div>
@endsection