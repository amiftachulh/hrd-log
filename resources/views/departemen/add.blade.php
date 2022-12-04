@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-3">Tambah Departemen</div>
  <form method="POST" action="{{ route('departemen.store') }}">
    @csrf
      <div class="mb-3">
        <label for="d_id" class="form-label">ID Departemen</label>
        <input type="text" id="d_id" class="form-control" name="d_id">
      </div>
      <div class="mb-3">
        <label for="d_nama" class="form-label">Nama Departemen</label>
        <input type="text" id="d_nama" class="form-control" name="d_nama">
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Tambah</button>
      </div>
  </form>
@endsection