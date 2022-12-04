<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PekerjaanController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM pekerjaan WHERE is_deleted = 0');
        return view('pekerjaan.index')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM pekerjaan WHERE w_nama LIKE \'%' . $search . '%\'');
        return view('pekerjaan.index')->with('datas', $datas);
    }

    public function create()
    {
        $dataDepartemen = DB::select('SELECT * FROM departemen');
        return view('pekerjaan.add')->with('dataDepartemen', $dataDepartemen);
    }

    public function store(Request $request)
    {
        $request->validate([
            'w_id' => 'required',
            'w_nama' => 'required',
            'd_id' => 'required'
        ]);

        DB::insert('INSERT INTO pekerjaan(w_id, w_nama, d_id) VALUES (:w_id, :w_nama, :d_id)', [
            'w_id' => $request->w_id,
            'w_nama' => $request->w_nama,
            'd_id' => $request->d_id
        ]);

        return redirect()->route('pekerjaan.index');
    }

    public function edit($id)
    {
        $data = DB::table('pekerjaan')->where('w_id', $id)->first();
        $dataDepartemen = DB::select('SELECT * FROM departemen');
        return view('pekerjaan.edit', compact('data', 'dataDepartemen'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'w_id' => 'required',
            'w_nama' => 'required',
            'd_id' => 'required'
        ]);

        DB::update('UPDATE pekerjaan SET w_id = :w_id, w_nama = :w_nama, d_id = :d_id WHERE w_id = :id', [
            'id' => $id,
            'w_id' => $request->w_id,
            'w_nama' => $request->w_nama,
            'd_id' => $request->d_id
        ]);

        return redirect()->route('pekerjaan.index');
    }

    public function softDelete($id)
    {
        DB::update('UPDATE pekerjaan SET is_deleted = 1 WHERE w_id = :w_id', ['w_id' => $id]);
        return redirect()->route('pekerjaan.index');
    }

    public function recycle()
    {
        $datas = DB::select('SELECT * FROM pekerjaan WHERE is_deleted = 1');
        return view('pekerjaan.recycle')->with('datas', $datas);
    }

    public function restore($id)
    {
        DB::update('UPDATE pekerjaan SET is_deleted = 0 WHERE w_id = :w_id', ['w_id' => $id]);
        return redirect()->route('pekerjaan.recycle');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM pekerjaan WHERE w_id = :w_id', ['w_id' => $id]);
        return redirect()->route('pekerjaan.recycle');
    }
}
