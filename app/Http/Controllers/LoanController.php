<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $loans = Loan::with(['book', 'user'])
            ->when($search, function ($query, $search) {
                $query->whereHas('book', function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%");
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate(6);

        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::where('stock', '>', 0)->get(); // Hanya buku dengan stok > 0
        return view('loans.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
            'is_returned' => 'boolean',
        ]);

        $book = Book::findOrFail($request->book_id);
        if ($book->stock <= 0) {
            return back()->withErrors(['book_id' => 'This book is out of stock.']);
        }

        Loan::create($request->all());

        $book->decrement('stock');

        return redirect()->route('loans.index')->with('success', 'Loan created successfully.');
    }

    public function edit(Loan $loan)
    {
        $users = User::all();
        $books = Book::all();

        return view('loans.edit', compact('loan', 'users', 'books'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
            'is_returned' => 'boolean',
        ]);

        if ($loan->book_id != $request->book_id) {
            $oldBook = Book::findOrFail($loan->book_id);
            $newBook = Book::findOrFail($request->book_id);

            if ($newBook->stock <= 0 && !$loan->is_returned) {
                return back()->withErrors(['book_id' => 'This book is out of stock.']);
            }

            if (!$loan->is_returned) {
                $oldBook->increment('stock');
                $newBook->decrement('stock');
            }
        }

        // Jika status is_returned berubah menjadi true, tambah stok
        if (!$loan->is_returned && $request->is_returned) {
            $loan->book->increment('stock');
        } elseif ($loan->is_returned && !$request->is_returned) {
            $loan->book->decrement('stock');
        }

        $loan->update($request->all());

        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

    public function destroy(Loan $loan)
    {
        // Tambah stok buku jika belum dikembalikan
        if (!$loan->is_returned) {
            $loan->book->increment('stock');
        }

        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
    }
}
