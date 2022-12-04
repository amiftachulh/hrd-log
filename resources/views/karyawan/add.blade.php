@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-3">Tambah Karyawan</div>
  <form method="POST" action="{{ route('karyawan.store') }}">
    @csrf
      <div class="mb-3">
        <label for="e_id" class="form-label">ID Karyawan</label>
        <input type="text" id="e_id" class="form-control" name="e_id">
      </div>
      <div class="mb-3">
        <label for="e_nama" class="form-label">Nama Karyawan</label>
        <input type="text" id="e_nama" class="form-control" name="e_nama">
      </div>
      <div class="mb-3">
        <label for="e_tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" id="e_tempat_lahir" class="form-control" name="e_tempat_lahir">
      </div>
      <div class="mb-3">
        <label for="e_tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" id="e_tgl_lahir" class="form-control" name="e_tgl_lahir">
      </div>
      <div class="mb-3">
        <label for="e_alamat" class="form-label">Alamat</label>
        <input type="text" id="e_alamat" class="form-control" name="e_alamat">
      </div>
      <div class="mb-3">
        <label for="e_email" class="form-label">Email</label>
        <input type="text" id="e_email" class="form-control" name="e_email">
      </div>
      <div class="mb-3">
        <label for="e_no_hp" class="form-label">No. HP</label>
        <input type="text" id="e_no_hp" class="form-control" name="e_no_hp">
      </div>
      <div class="mb-3">
        <label for="e_gaji" class="form-label">Gaji</label>
        <input type="text" id="e_gaji" class="form-control" name="e_gaji">
      </div>
      <div class="mb-3">
        <label for="w_id" class="form-label">Pekerjaan</label>
        <select id="d_id" class="form-select" name="w_id">
          @foreach ($dataPekerjaan as $pekerjaan)
            <option value={{ $pekerjaan->w_id }}>{{ $pekerjaan->w_nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Tambah</button>
      </div>
  </form>
@endsection