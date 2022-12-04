@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Daftar Pekerjaan</div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('pekerjaan.add') }}">
      <button type="button" class="btn btn-primary rounded-0 mb-2">Tambah</button>
    </a>
    <a href="{{ route('pekerjaan.recycle') }}">
      <button type="button" class="btn btn-danger rounded-0 mb-2">Recycle Bin</button>
    </a>
  </div>
  <form action="/pekerjaan/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control" placeholder="Cari pekerjaan">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
  </form>
  <table class="table table-hover">
    <thead>
      <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
        <th scope="col">ID</th>
        <th scope="col">Nama Pekerjaan</th>
        <th scope="col">ID Departemen</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $data)
        <tr>
          <td>{{ $data->w_id }}</td>
          <td>{{ $data->w_nama }}</td>
          <td>{{ $data->d_id }}</td>
          <td>
            <a href="{{ route('pekerjaan.edit', $data->w_id) }}">
              <button type="button" class="btn btn-secondary">Edit</button>
            </a>
            <form action="{{ route('pekerjaan.softDelete', $data->w_id) }}" method="post" class="d-inline">
              @csrf
              <button class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection