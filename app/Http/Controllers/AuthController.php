<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Charts\peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login () {
        return view('login');
    }

    public function register () {
        return view('register');
    }

    public function authenticating (Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not Active, please contact Admin !');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {

                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid !');

        return redirect('/login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProcess(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'phone' => '',
            'address' => 'required',
        ]);

        $newName = '';
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $newName = $request->username . '-KTP-' . now()->timestamp . '.' . $ext;

            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        // Crypt::encryptString($request->password);
        // $validated['password'] = Crypt::encryptString($request->password);
        $request['password'] = Hash::make($request->password);

        $data = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register success. Wait admin approval');
        return view('register', compact(['data']));
    }
}
