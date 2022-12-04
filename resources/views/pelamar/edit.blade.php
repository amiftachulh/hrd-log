@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold mb-3">Edit Pelamar</div>
  <form method="POST" action="{{ route('pelamar.update', $data->a_id) }}">
    @csrf
      <div class="mb-3">
        <label for="a_id" class="form-label">ID Pelamar</label>
        <input type="text" id="a_id" class="form-control" name="a_id" value="{{ $data->a_id }}">
      </div>
      <div class="mb-3">
        <label for="a_nama" class="form-label">Nama Pelamar</label>
        <input type="text" id="a_nama" class="form-control" name="a_nama" value="{{ $data->a_nama }}">
      </div>
      <div class="mb-3">
        <label for="a_tempat_lahir" class="form-label">Tempat Lahir</label>
        <input type="text" id="a_tempat_lahir" class="form-control" name="a_tempat_lahir" value="{{ $data->a_tempat_lahir }}">
      </div>
      <div class="mb-3">
        <label for="a_tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" id="a_tgl_lahir" class="form-control" name="a_tgl_lahir" value="{{ $data->a_tgl_lahir }}">
      </div>
      <div class="mb-3">
        <label for="a_alamat" class="form-label">Alamat</label>
        <input type="text" id="a_alamat" class="form-control" name="a_alamat" value="{{ $data->a_alamat }}">
      </div>
      <div class="mb-3">
        <label for="a_email" class="form-label">Email</label>
        <input type="text" id="a_email" class="form-control" name="a_email" value="{{ $data->a_email }}">
      </div>
      <div class="mb-3">
        <label for="a_no_hp" class="form-label">No. HP</label>
        <input type="text" id="a_no_hp" class="form-control" name="a_no_hp" value="{{ $data->a_no_hp }}">
      </div>
      <div class="mb-3">
        <label for="w_id" class="form-label">Pekerjaan</label>
        <select id="d_id" class="form-select" name="w_id">
          @foreach ($dataPekerjaan as $pekerjaan)
            <option
              value="{{ $pekerjaan->w_id }}"
              @if ($pekerjaan->w_id == $data->w_id)
                selected
              @endif
            >
              {{ $pekerjaan->w_nama }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="text-center">
        <button class="btn btn-primary">Update</button>
      </div>
  </form>
@endsection