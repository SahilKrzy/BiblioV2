@extends('../welcome')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Eliminar Libro</h1>
                </div>
                <div class="card-body">
                    <p class="lead">¿Estás seguro que deseas eliminar el libro "{{ $book->title }}"?</p>
                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <br>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>