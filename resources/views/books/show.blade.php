@extends('../welcome')

@section('content')
<br>
<h1 class="text-center">{{ $book->title }}</h1>
<br>
<center>
    <div class="card mt-3 col-md-6">
        <div class="row no-gutters">

            <div class="col-md-4">
                <br>
                <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="card-img">
                <br><br>
                <p class="card-text">
                    <b>Fecha de publicación:</b> {{ $book->published_date }}<br>
                    <b>Precio:</b> {{ $book->price }}€
                </p>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Autor: {{ $book->author }}</h5>
                    <p class="card-text">
                    <h5>Descripción:</h5>{{ $book->description }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Categorías:</h6>
                    <ul class="list-unstyled">
                        @foreach($book->category as $category)
                        <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <a class="btn btn-secondary" href="{{ route('books.index') }}">Volver a la lista</a>
</center>
@endsection