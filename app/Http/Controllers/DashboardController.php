<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Loan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'available_books' => Book::where('stock', '>', 0)->count(),
            'total_categories' => Category::count(),
            'total_publishers' => Publisher::count(),
            'total_authors' => Author::count(),
            'active_loans' => Loan::where('is_returned', false)->count(),
        ];

        return view('dashboard', $stats);
    }
}
