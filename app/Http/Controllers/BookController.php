<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.book', ['books' => $books]);
    }

    public function add()
    {
        $q = Book::select('book_code', 'as', 'kode')->count();
        $date = Carbon::now()->format('Ymd');
        $time = Carbon::now()->format('sih');
        $kd = $time.($q + 1).$date;

        $categories = Category::all();
        return view('book.book-add', ['categories' => $categories, 'kd' => $kd]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_code' => 'required|unique:books',
            'title' => 'required',
        ]);

        $newName = '';
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;

            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;

        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Book Added Successfully');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();

        return view('book.book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $ext;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());

        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'Book Updated Successfully');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot Delete Book, the book is borrow');
            Session::flash('alert-class', 'alert-danger');
            return redirect('books');
        } else {
            return view('book.book-delete', ['book' => $book]);   
        }
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Successlifully');
    }

    public function bookDeleted()
    {
        $book = Book::onlyTrashed()->get();
        return view('book.book-deleted', ['book' => $book]);
    }

    public function bookRestore($slug)
    {
        $book = Book::withTrashed()
            ->where('slug', $slug)
            ->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successlifully');
    }

    public function bookDelPerm($slug)
    {
        $book = Book::withTrashed()
                ->where('slug', $slug)
                ->first();

        if ($book['status'] != 'in stock') {
            Session::flash('message', 'Cannot Delete Book, the book is borrow');
            Session::flash('alert-class', 'alert-danger');
            return redirect('books');
        } else {
            $book->forceDelete();
            Session::flash('message', 'Book Deleted Successlifully');
            Session::flash('alert-class', 'alert-success');
            return redirect('books');
        }
    }
}
