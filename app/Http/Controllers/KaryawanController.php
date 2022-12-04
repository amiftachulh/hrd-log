<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM karyawan WHERE is_deleted = 0');
        return view('karyawan.index')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM karyawan WHERE e_nama LIKE \'%' . $search . '%\'');
        return view('karyawan.index')->with('datas', $datas);
    }

    public function create()
    {
        $dataPekerjaan = DB::select('SELECT w_id, w_nama FROM pekerjaan');
        return view('karyawan.add')->with('dataPekerjaan', $dataPekerjaan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'e_id' => 'required',
            'e_nama' => 'required',
            'e_tempat_lahir' => 'required',
            'e_tgl_lahir' => 'required',
            'e_alamat' => 'required',
            'e_email' => 'required',
            'e_no_hp' => 'required',
            'e_gaji' => 'required',
            'w_id' => 'required'
        ]);

        DB::insert('INSERT INTO karyawan(e_id, e_nama, e_tempat_lahir, e_tgl_lahir, e_alamat, e_email, e_no_hp, e_gaji, w_id) VALUES (:e_id, :e_nama, :e_tempat_lahir, :e_tgl_lahir, :e_alamat, :e_email, :e_no_hp, :e_gaji, :w_id)', [
            'e_id' => $request->e_id,
            'e_nama' => $request->e_nama,
            'e_tempat_lahir' => $request->e_tempat_lahir,
            'e_tgl_lahir' => $request->e_tgl_lahir,
            'e_alamat' => $request->e_alamat,
            'e_email' => $request->e_email,
            'e_no_hp' => $request->e_no_hp,
            'e_gaji' => $request->e_gaji,
            'w_id' => $request->w_id
        ]);

        return redirect()->route('karyawan.index');
    }

    public function edit($id)
    {
        $data = DB::table('karyawan')->where('e_id', $id)->first();
        $dataPekerjaan = DB::select('SELECT w_id, w_nama FROM pekerjaan');
        return view('karyawan.edit', compact('data', 'dataPekerjaan'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'e_id' => 'required',
            'e_nama' => 'required',
            'e_tempat_lahir' => 'required',
            'e_tgl_lahir' => 'required',
            'e_alamat' => 'required',
            'e_email' => 'required',
            'e_no_hp' => 'required',
            'e_gaji' => 'required',
            'w_id' => 'required'
        ]);

        DB::update('UPDATE karyawan SET e_id = :e_id, e_nama = :e_nama, e_tempat_lahir = :e_tempat_lahir, e_tgl_lahir = :e_tgl_lahir, e_alamat = :e_alamat, e_email = :e_email, e_no_hp = :e_no_hp, e_gaji = :e_gaji, w_id = :w_id WHERE e_id = :id', [
            'id' => $id,
            'e_id' => $request->e_id,
            'e_nama' => $request->e_nama,
            'e_tempat_lahir' => $request->e_tempat_lahir,
            'e_tgl_lahir' => $request->e_tgl_lahir,
            'e_alamat' => $request->e_alamat,
            'e_email' => $request->e_email,
            'e_no_hp' => $request->e_no_hp,
            'e_gaji' => $request->e_gaji,
            'w_id' => $request->w_id
        ]);

        return redirect()->route('karyawan.index');
    }

    public function softDelete($id)
    {
        DB::update('UPDATE karyawan SET is_deleted = 1 WHERE e_id = :e_id', ['e_id' => $id]);
        return redirect()->route('karyawan.index');
    }

    public function recycle()
    {
        $datas = DB::select('SELECT * FROM karyawan WHERE is_deleted = 1');
        return view('karyawan.recycle')->with('datas', $datas);
    }

    public function restore($id)
    {
        DB::update('UPDATE karyawan SET is_deleted = 0 WHERE e_id = :e_id', ['e_id' => $id]);
        return redirect()->route('karyawan.recycle');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM karyawan WHERE e_id = :e_id', ['e_id' => $id]);
        return redirect()->route('karyawan.recycle');
    }
}
