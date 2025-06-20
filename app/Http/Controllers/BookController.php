<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $books = Book::with(['category', 'publisher', 'authors'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('isbn', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('publisher', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('authors', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->simplePaginate(6);

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
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
        ]);

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
        }

        $book = Book::create(array_merge(
            $request->only([
                'title',
                'isbn',
                'publication_year',
                'category_id',
                'publisher_id',
                'stock',
                'description',
            ]),
            ['cover_image' => $coverImagePath]
        ));

        $book->authors()->attach($request->authors);

        return redirect()->route('books.index')->with('success', 'Buku berhasil dibuat.');
    }


    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'publishers', 'authors'));
    }

    public function show(Book $book)
    {
        $book = Book::with(['category', 'publisher', 'authors'])->findOrFail($book->id);
        return view('books.show', compact('book'));
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
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $book->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($request->only([
            'title',
            'isbn',
            'publication_year',
            'category_id',
            'publisher_id',
            'stock',
            'description',
        ]));

        $book->authors()->sync($request->authors);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function publicIndex(Request $request)
    {
        $search = $request->query('search');

        $books = Book::with(['category', 'publisher', 'authors'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('isbn', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('publisher', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('authors', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            })
            ->simplePaginate(12);

        return view('books.public', compact('books'));
    }
}
