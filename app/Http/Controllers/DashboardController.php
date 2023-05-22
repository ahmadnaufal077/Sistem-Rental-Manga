<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index () {
        // $result = DB::select('select * from users where active = ?', [1]);

        $book = Book::count();
        $category = Category::count();
        $user = User::count();
        $rentlog = RentLog::count();
        $rentlogs = RentLog::with(['user', 'book'])->get();
        return view('users.dashboard', ['book' => $book, 'category' => $category, 'user' => $user, 'rentlog' => $rentlog, 'rentlogs' => $rentlogs]);
    }
}
