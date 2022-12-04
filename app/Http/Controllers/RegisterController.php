<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function actionRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        DB::insert('INSERT INTO users(username, password) VALUES (:username, :password)', [
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/')->with('success', 'Berhasil mendaftar');
    }
}
