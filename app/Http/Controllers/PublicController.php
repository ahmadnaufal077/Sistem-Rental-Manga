<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->title) {
            $books = Book::where('title', 'like', '%' . $request->title . '%')
            ->get();
        } 
        else {
            $books = Book::paginate(12);
        }

        return view('book.index', ['books' => $books, 'categories' => $categories]);
    }
}
