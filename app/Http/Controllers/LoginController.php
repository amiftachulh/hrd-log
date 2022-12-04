<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/dashboard');
        } else {
            Session::flash('error', 'Username atau password salah');
            return redirect('/');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
