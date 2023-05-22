<?php

namespace App\Http\Controllers;

use App\Charts\peminjam;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)
            ->where('status', '!=', 'inactive')
            ->get();
        $books = Book::all();
        return view('book.book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()
            ->addDay(3)
            ->toDateString();

        $books = Book::findOrFail($request->book_id)->only('status');

        if ($books['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLog::where('user_id', $request->user_id)
                ->where('actual_return_date', null)
                ->count();

            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, user has reach limit of books');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    
                    DB::beginTransaction();
                    RentLog::create($request->all());
                    $books = Book::findOrFail($request->book_id);
                    $books->status = 'not available';
                    $books->save();
                    DB::commit();

                    Session::flash('message', 'Rent book success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('id', '!=', 1)
            ->where('status', '!=', 'inactive')
            ->get();
        $books = Book::all();
        return view('book.book-return', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        // $rent = RentLog::where('user_id'. $request->user_id)
        // ->where('book_id', $request->book_id)
        // ->where('actual_return_date', null)
        // ->count();
        $rent = RentLog::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        // dd($rentData);
        if ($countData == 1) {
            $books = Book::where('status', '!=', 'in stock')->first();
            $rentData['actual_return_date'] = Carbon::now()->toDateString();
            $books->status = 'in stock';
            $books->save();
            $rentData->save();


            Session::flash('message', 'The book is returned successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            Session::flash('message', 'There is error in proccess');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
