@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-3">Edit Departemen</div>
  <form method="POST" action="{{ route('departemen.update', $data->d_id) }}">
    @csrf
      <div class="mb-3">
        <label for="d_id" class="form-label">ID Departemen</label>
        <input type="text" id="d_id" class="form-control" name="d_id" value="{{ $data->d_id }}">
      </div>
      <div class="mb-3">
        <label for="d_nama" class="form-label">Nama Departemen</label>
        <input type="text" id="d_nama" class="form-control" name="d_nama" value="{{ $data->d_nama }}">
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Update</button>
      </div>
  </form>
@endsection