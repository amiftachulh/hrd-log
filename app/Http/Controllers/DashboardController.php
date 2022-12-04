<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT e.e_id, e.e_nama, w.w_nama FROM karyawan AS e JOIN pekerjaan AS w ON e.w_id = w.w_id');
        return view('dashboard')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT e.e_id, e.e_nama, w.w_nama FROM karyawan AS e JOIN pekerjaan AS w ON e.w_id = w.w_id WHERE e.e_nama LIKE \'%' . $search . '%\'');
        return view('dashboard')->with('datas', $datas);
    }
}
