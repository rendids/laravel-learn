@extends('layout.app')

@section('title','penugasan')
@section('pagename','Tabel penugasan')
@section('content')
<div class="card">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    </script>
    @endif
    <div class="card-body">
      <h5 class="card-title">Daftar penugasan</h5>
      <div class="card-body d-flex justify-content-end">
        <a href="{{ route('penugasan.create') }}" class="btn btn-primary">tambah</a>
      </div>

      <!-- Bordered Table -->
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama karyawan</th>
            <th scope="col">Nama Proyek</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if (count($tugas) > 0)
            @foreach ($tugas as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->karyawan->nama }}</td>
            <td>{{ $item->proyek->nama_proyek }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('penugasan.edit', ['id' => $item->id]) }}">Edit</a>
                <form id="deleteForm{{ $item->id }}" action="{{ route('penugasan.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); showDeleteConfirmation({{ $item->id }})">
                        Hapus
                    </button>
                </form>

                <script>
                    function showDeleteConfirmation(itemId) {
                        Swal.fire({
                            title: 'Kamu yakin?',
                            text: 'Kamu tidak dapat mengembalikan ini!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('deleteForm' + itemId).submit();
                            }
                        });
                    }
                </script>
            </td>
            </td>
        </tr>
        @endforeach
            @else
            <tr>
                <td colspan="5" class="text-danger">tidak ada data</td>
            </tr>
            @endif
        </tbody>
      </table>
@endsection
