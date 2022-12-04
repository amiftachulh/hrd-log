@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Daftar Karyawan</div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('karyawan.add') }}">
      <button type="button" class="btn btn-primary rounded-0 mb-2">Tambah</button>
    </a>
    <a href="{{ route('karyawan.recycle') }}">
      <button type="button" class="btn btn-danger rounded-0 mb-2">Recycle Bin</button>
    </a>
  </div>
  <form action="/karyawan/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control" placeholder="Cari karyawan">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
  </form>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
          <th scope="col">ID</th>
          <th scope="col">Nama Karyawan</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Alamat</th>
          <th scope="col">Email</th>
          <th scope="col">No. HP</th>
          <th scope="col">Gaji</th>
          <th scope="col">ID Pekerjaan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
          <tr>
            <td>{{ $data->e_id }}</td>
            <td class="text-nowrap">{{ $data->e_nama }}</td>
            <td class="text-nowrap">{{ $data->e_tempat_lahir }}</td>
            <td class="text-nowrap">{{ $data->e_tgl_lahir }}</td>
            <td class="text-nowrap">{{ $data->e_alamat }}</td>
            <td class="text-nowrap">{{ $data->e_email }}</td>
            <td class="text-nowrap">{{ $data->e_no_hp }}</td>
            <td class="text-nowrap">Rp {{ number_format($data->e_gaji, 0, ',', '.') }}</td>
            <td>{{ $data->w_id }}</td>
            <td class="text-nowrap">
              <a href="{{ route('karyawan.edit', $data->e_id) }}">
                <button type="button" class="btn btn-secondary">Edit</button>
              </a>
              <form action="{{ route('karyawan.softDelete', $data->e_id) }}" method="post" class="d-inline">
                @csrf
                <button class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection