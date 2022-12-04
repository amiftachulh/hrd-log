@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Recycle Bin</div>
  <a href="{{ route('departemen.index') }}">
    <button type="button" class="btn btn-primary rounded-0 mb-2">Kembali</button>
  </a>
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
            <form action="{{ route('departemen.restore', $data->d_id) }}" method="post" class="d-inline">
              @csrf
              <button class="btn btn-secondary">Restore</button>
            </form>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->d_id }}">
              Hapus
            </button>
            <div class="modal fade" id="hapusModal{{ $data->d_id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="POST" action="{{ route('departemen.delete', $data->d_id) }}">
                    @csrf
                    <div class="modal-body">
                      Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection