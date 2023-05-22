<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $rentlogs = RentLog::with(['user', 'book'])
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('users.profile', ['rentlogs' => $rentlogs]);
        // $request->session()->flush();
    }

    public function index()
    {
        $users = User::where('role_id', 2)
            ->where('status', 'active')
            ->get();
        return view('users.user', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registered = User::where('role_id', 2)
            ->where('status', 'inactive')
            ->get();
        return view('users.registered-user', ['registered' => $registered]);
    }

    public function detail($slug)
    {
        $users = User::where('slug', $slug)->first();
        $rentlogs = RentLog::with(['user', 'book'])
            ->where('user_id', $users->id)
            ->get();
        return view('users.user-detail', ['users' => $users, 'rentlogs' => $rentlogs]);
    }

    public function userApprove($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->status = 'active';
        $users->save();

        Session::flash('message', 'User Approved Successlifully');
        Session::flash('alert-class', 'alert-success');

        return redirect('user-detail/' . $slug);
    }

    public function userDelete($slug)
    {
        $users = User::where('slug', $slug)->first();
        if ($users['status'] != 'active') {
            return view('users.user-delete', ['users' => $users]);
        } else {
            Session::flash('message', 'Cannot Delete User, the users is active');
            Session::flash('alert-class', 'alert-danger');
            return redirect('users');
        }
    }

    public function userDestroy($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->delete();

        Session::flash('message', 'User Deleted Successlifully');
        Session::flash('alert-class', 'alert-success');
        return redirect('users');
    }

    public function userDeleted()
    {
        $users = User::onlyTrashed()->get();
        return view('users.user-deleted', ['users' => $users]);
    }

    public function userRestore($slug)
    {
        $users = User::withTrashed()
            ->where('slug', $slug)
            ->first();
        $users->restore();

        Session::flash('message', 'Restore user Successly');
        Session::flash('alert-class', 'alert-success');

        return redirect('registered-user');
    }

    public function profileDetail()
    {
        $users = User::where('id', Auth::user()->id)->first();
        return view('users.profile-detail', ['users' => $users]);
    }

    public function userEdit($slug)
    {
        $users = User::where('slug', $slug)->first();
        return view('users.user-edit', ['users' => $users]);
    }

    public function userUpdate(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $user->update($request->all());

        Session::flash('message', 'Updated user Successly');
        Session::flash('alert-class', 'alert-success');
        return redirect('user-edit');
    }

    public function userReset($slug)
    {
        $users = User::where('slug', $slug)->first();
        $users->password = Hash::make('12345678');

        $users->save();

        Session::flash('message', 'Reset password user is Successlifully');
        Session::flash('alert-class', 'alert-success');

        return redirect('user-edit/' . $slug);
    }
}
