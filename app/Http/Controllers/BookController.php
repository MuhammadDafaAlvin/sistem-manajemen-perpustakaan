<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'publisher', 'authors'])->simplePaginate(7);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('books.create', compact('categories', 'publishers', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books',
            'publication_year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        $book = Book::create($request->only([
            'title',
            'isbn',
            'publication_year',
            'category_id',
            'publisher_id',
            'stock',
            'description'
        ]));

        $book->authors()->attach($request->authors);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'publishers', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'publication_year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        $book->update($request->only([
            'title',
            'isbn',
            'publication_year',
            'category_id',
            'publisher_id',
            'stock',
            'description'
        ]));

        $book->authors()->sync($request->authors);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function publicIndex()
    {
        $books = Book::with(['category', 'publisher', 'authors'])->paginate(12);
        return view('books.public', compact('books'));
    }
}
