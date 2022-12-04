@extends('layout')
@section('content')
  <div class="title text-center fs-3 fw-semibold">Recycle Bin</div>
  <a href="{{ route('karyawan.index') }}">
    <button type="button" class="btn btn-primary rounded-0 mb-2">Kembali</button>
  </a>
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
              <form action="{{ route('karyawan.restore', $data->e_id) }}" method="post" class="d-inline">
                @csrf
                <button class="btn btn-secondary">Restore</button>
              </form>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->e_id }}">
                Hapus
              </button>
              <div class="modal fade" id="hapusModal{{ $data->e_id }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('karyawan.delete', $data->e_id) }}">
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
  </div>
@endsection