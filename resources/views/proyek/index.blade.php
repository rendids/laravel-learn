@extends('layout.app')

@section('title','proyek')
@section('pagename','Tabel proyek')
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
      <h5 class="card-title">Daftar proyek</h5>
      <div class="card-body d-flex justify-content-end">
        <a href="{{ route('proyek.create') }}" class="btn btn-primary">tambah</a>
      </div>

      <!-- Bordered Table -->
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama proyek</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">tanggal mulai</th>
            <th scope="col">tanggal selesai</th>
            <th scope="col">aksi</th>
          </tr>
        </thead>
        <tbody>
            @if (count($proyeks) > 0)
            @foreach ($proyeks as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->nama_proyek }}</td>
            <td>{{ $item->deskripsi}}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->locale('id')->isoFormat('LL') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->locale('id')->isoFormat('LL') }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('proyek.edit', ['id' => $item->id]) }}">Edit</a>
                <form id="deleteForm{{ $item->id }}" action="{{ route('proyek.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline">
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
                <td colspan="6" class="text-danger">tidak ada data</td>
            </tr>
            @endif
        </tbody>
      </table>
@endsection
