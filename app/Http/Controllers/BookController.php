<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('authors');

        if ($request->has('author_id')) {
            $query->whereHas('authors', function($q) use ($request) {
                $q->where('authors.id', $request->author_id);
            });
        }

        return response()->json($query->get());
    }

    public function authors()
    {
        return response()->json(Author::all());
    }
}
