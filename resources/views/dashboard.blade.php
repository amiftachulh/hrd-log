@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-2">Daftar Karyawan dan Pekerjaan</div>
  <form action="/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control" placeholder="Cari karyawan">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
  </form>
  <table class="table table-hover">
    <thead>
      <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
        <th scope="col">ID</th>
        <th scope="col">Nama Karyawan</th>
        <th scope="col">Pekerjaan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($datas as $data)
        <tr>
          <td>{{ $data->e_id }}</td>
          <td>{{ $data->e_nama }}</td>
          <td>{{ $data->w_nama }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection