@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Daftar Pelamar</div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('pelamar.add') }}">
      <button type="button" class="btn btn-primary rounded-0 mb-2">Tambah</button>
    </a>
    <a href="{{ route('pelamar.recycle') }}">
      <button type="button" class="btn btn-danger rounded-0 mb-2">Recycle Bin</button>
    </a>
  </div>
  <form action="/pelamar/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control" placeholder="Cari pelamar">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
  </form>
  <table class="table table-hover table-responsive">
    <thead>
      <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
        <th scope="col">ID</th>
        <th scope="col">Nama Pelamar</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Alamat</th>
        <th scope="col">Email</th>
        <th scope="col">No. HP</th>
        <th scope="col">ID Pekerjaan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $data)
        <tr>
          <td>{{ $data->a_id }}</td>
          <td class="text-nowrap">{{ $data->a_nama }}</td>
          <td class="text-nowrap">{{ $data->a_tempat_lahir }}</td>
          <td class="text-nowrap">{{ $data->a_tgl_lahir }}</td>
          <td class="text-nowrap">{{ $data->a_alamat }}</td>
          <td class="text-nowrap">{{ $data->a_email }}</td>
          <td class="text-nowrap">{{ $data->a_no_hp }}</td>
          <td>{{ $data->w_id }}</td>
          <td class="text-nowrap">
            <a href="{{ route('pelamar.edit', $data->a_id) }}">
              <button type="button" class="btn btn-secondary">Edit</button>
            </a>
            <form action="{{ route('pelamar.softDelete', $data->a_id) }}" method="post" class="d-inline">
              @csrf
              <button class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection