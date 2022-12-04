<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartemenController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM departemen WHERE is_deleted = 0');
        return view('departemen.index')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM departemen WHERE d_nama LIKE \'%' . $search . '%\'');
        return view('departemen.index')->with('datas', $datas);
    }

    public function create()
    {
        return view('departemen.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'd_id' => 'required',
            'd_nama' => 'required',
        ]);

        DB::insert('INSERT INTO departemen(d_id, d_nama) VALUES (:d_id, :d_nama)', [
            'd_id' => $request->d_id,
            'd_nama' => $request->d_nama
        ]);

        return redirect()->route('departemen.index');
    }

    public function edit($id)
    {
        $data = DB::table('departemen')->where('d_id', $id)->first();
        return view('departemen.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'd_id' => 'required',
            'd_nama' => 'required'
        ]);

        DB::update('UPDATE departemen SET d_id = :d_id, d_nama = :d_nama WHERE d_id = :id', [
            'id' => $id,
            'd_id' => $request->d_id,
            'd_nama' => $request->d_nama
        ]);

        return redirect()->route('departemen.index');
    }

    public function softDelete($id)
    {
        DB::update('UPDATE departemen SET is_deleted = 1 WHERE d_id = :d_id', ['d_id' => $id]);
        return redirect()->route('departemen.index');
    }

    public function recycle()
    {
        $datas = DB::select('SELECT * FROM departemen WHERE is_deleted = 1');
        return view('departemen.recycle')->with('datas', $datas);
    }

    public function restore($id)
    {
        DB::update('UPDATE departemen SET is_deleted = 0 WHERE d_id = :d_id', ['d_id' => $id]);
        return redirect()->route('departemen.recycle');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM departemen WHERE d_id = :d_id', ['d_id' => $id]);
        return redirect()->route('departemen.recycle');
    }
}
