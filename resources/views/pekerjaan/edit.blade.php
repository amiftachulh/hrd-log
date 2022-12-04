@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-3">Edit Pekerjaan</div>
  <form method="POST" action="{{ route('pekerjaan.update', $data->w_id) }}">
    @csrf
      <div class="mb-3">
        <label for="w_id" class="form-label">ID Pekerjaan</label>
        <input type="text" id="w_id" class="form-control" name="w_id" value="{{ $data->w_id }}">
      </div>
      <div class="mb-3">
        <label for="w_nama" class="form-label">Nama Pekerjaan</label>
        <input type="text" id="w_nama" class="form-control" name="w_nama" value="{{ $data->w_nama }}">
      </div>
      <div class="mb-3">
        <label for="d_id" class="form-label">Departemen</label>
        <select id="d_id" class="form-select" name="d_id">
          @foreach ($dataDepartemen as $departemen)
            <option
              value="{{ $departemen->d_id }}"
              @if ($departemen->d_id == $data->d_id)
                selected
              @endif
            >
              {{ $departemen->d_nama }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Update</button>
      </div>
  </form>
@endsection