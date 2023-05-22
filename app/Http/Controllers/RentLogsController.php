<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentLog;
use Illuminate\Http\Request;

class RentLogsController extends Controller
{
    public function rentLog()
    {
        // $today = Carbon::now()->toDateString();
        $rentlogs = RentLog::with(['user', 'book'])->get();
        
        return view('book.rent-logs', ['rentlogs' => $rentlogs]);
    }
}
