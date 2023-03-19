<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $selectedCategory = $request->category;

        $query = Book::query();

        // Obtener y procesar el término de búsqueda
        $search = $request->input('search');
        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $books = $query->with('category')
            ->when($selectedCategory, function ($query, $selectedCategory) {
                return $query->whereHas('category', function ($query) use ($selectedCategory) {
                    $query->where('id', $selectedCategory);
                });
            })
            ->paginate(10);

        return view('books.index', compact('books', 'categories', 'selectedCategory', 'search'));
    }




    public function show($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.show', compact('book', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $faker = Faker::create();
        $book = new Book;
        $book->isbn = $faker->isbn13();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->image_url = $request->image_url;
        $book->description = $request->description;
        $book->published_date = now();
        $book->price = $request->price;
        $book->save();

        $book->category()->sync($request->input('categories', []));

        return redirect()->route('books.index');
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edita', compact('book', 'categories'));
    }


    public function update(Request $request)
    {
        $book = Book::findOrFail($request->input('id'));

        $book->title = $request->title;
        $book->author = $request->author;
        $book->image_url = $request->image_url;
        $book->description = $request->description;
        $book->price = $request->price;

        $book->update();

        $book->category()->sync($request->input('categories', []));

        return redirect()->route('books.index');
    }


    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.confirm-delete', compact('book', 'categories'));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
