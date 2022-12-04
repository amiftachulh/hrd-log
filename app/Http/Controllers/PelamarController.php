<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelamarController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM pelamar WHERE is_deleted = 0');
        return view('pelamar.index')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM pelamar WHERE a_nama LIKE \'%' . $search . '%\'');
        return view('pelamar.index')->with('datas', $datas);
    }

    public function create()
    {
        $dataPekerjaan = DB::select('SELECT w_id, w_nama FROM pekerjaan');
        return view('pelamar.add')->with('dataPekerjaan', $dataPekerjaan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'a_id' => 'required',
            'a_nama' => 'required',
            'a_tempat_lahir' => 'required',
            'a_tgl_lahir' => 'required',
            'a_alamat' => 'required',
            'a_email' => 'required',
            'a_no_hp' => 'required',
            'w_id' => 'required'
        ]);

        DB::insert('INSERT INTO pelamar(a_id, a_nama, a_tempat_lahir, a_tgl_lahir, a_alamat, a_email, a_no_hp, w_id) VALUES (:a_id, :a_nama, :a_tempat_lahir, :a_tgl_lahir, :a_alamat, :a_email, :a_no_hp, :w_id)', [
            'a_id' => $request->a_id,
            'a_nama' => $request->a_nama,
            'a_tempat_lahir' => $request->a_tempat_lahir,
            'a_tgl_lahir' => $request->a_tgl_lahir,
            'a_alamat' => $request->a_alamat,
            'a_email' => $request->a_email,
            'a_no_hp' => $request->a_no_hp,
            'w_id' => $request->w_id
        ]);

        return redirect()->route('pelamar.index');
    }

    public function edit($id)
    {
        $data = DB::table('pelamar')->where('a_id', $id)->first();
        $dataPekerjaan = DB::select('SELECT w_id, w_nama FROM pekerjaan');
        return view('pelamar.edit', compact('data', 'dataPekerjaan'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'a_id' => 'required',
            'a_nama' => 'required',
            'a_tempat_lahir' => 'required',
            'a_tgl_lahir' => 'required',
            'a_alamat' => 'required',
            'a_email' => 'required',
            'a_no_hp' => 'required',
            'w_id' => 'required'
        ]);

        DB::update('UPDATE pelamar SET a_id = :a_id, a_nama = :a_nama, a_tempat_lahir = :a_tempat_lahir, a_tgl_lahir = :a_tgl_lahir, a_alamat = :a_alamat, a_email = :a_email, a_no_hp = :a_no_hp, w_id = :w_id WHERE a_id = :id', [
            'id' => $id,
            'a_id' => $request->a_id,
            'a_nama' => $request->a_nama,
            'a_tempat_lahir' => $request->a_tempat_lahir,
            'a_tgl_lahir' => $request->a_tgl_lahir,
            'a_alamat' => $request->a_alamat,
            'a_email' => $request->a_email,
            'a_no_hp' => $request->a_no_hp,
            'w_id' => $request->w_id
        ]);

        return redirect()->route('pelamar.index');
    }

    public function softDelete($id)
    {
        DB::update('UPDATE pelamar SET is_deleted = 1 WHERE a_id = :a_id', ['a_id' => $id]);
        return redirect()->route('pelamar.index');
    }

    public function recycle()
    {
        $datas = DB::select('SELECT * FROM pelamar WHERE is_deleted = 1');
        return view('pelamar.recycle')->with('datas', $datas);
    }

    public function restore($id)
    {
        DB::update('UPDATE pelamar SET is_deleted = 0 WHERE a_id = :a_id', ['a_id' => $id]);
        return redirect()->route('pelamar.recycle');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM pelamar WHERE a_id = :a_id', ['a_id' => $id]);
        return redirect()->route('pelamar.recycle');
    }
}
