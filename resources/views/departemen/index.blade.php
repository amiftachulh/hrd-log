@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Daftar Departemen</div>
  <div class="d-flex justify-content-between">
    <a href="{{ route('departemen.add') }}">
      <button type="button" class="btn btn-primary rounded-0 mb-2">Tambah</button>
    </a>
    <a href="{{ route('departemen.recycle') }}">
      <button type="button" class="btn btn-danger rounded-0 mb-2">Recycle Bin</button>
    </a>
  </div>
  <form action="/departemen/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control" placeholder="Cari departemen">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
  </form>
  <table class="table table-hover">
    <thead>
      <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
        <th scope="col">ID</th>
        <th scope="col">Nama Departemen</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $data)
        <tr>
          <td>{{ $data->d_id }}</td>
          <td>{{ $data->d_nama }}</td>
          <td>
            <a href="{{ route('departemen.edit', $data->d_id) }}">
              <button type="button" class="btn btn-secondary">Edit</button>
            </a>
            <form action="{{ route('departemen.softDelete', $data->d_id) }}" method="post" class="d-inline">
              @csrf
              <button class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection