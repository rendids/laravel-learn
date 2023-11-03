@extends('layout.app')

@section('title','karyawan')
@section('pagename','Tabel karyawan')
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
      <h5 class="card-title">Daftar karyawan</h5>
      <div class="card-body d-flex justify-content-end">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">tambah</a>
      </div>

      <!-- Bordered Table -->
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis-Kelamin</th>
            <th scope="col">alamat</th>
            <th scope="col">departemen</th>
            <th scope="col">Bergabung pada</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if (count($karyawans) > 0)
            @foreach ($karyawans as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                <img src="{{ asset('storage/gambar/'.$item->gambar) }}" alt="" srcset="" class="rounded-circle" width="50">
            </td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jk }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->departemen->name }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('LL') }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('karyawan.edit', ['id' => $item->id]) }}">Edit</a>
                <form id="deleteForm{{ $item->id }}" action="{{ route('karyawan.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline">
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
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="8" class="text-danger">tidak ada data</td>
        </tr>
        @endif
        </tbody>
      </table>
      <div class="d-flex">
   </div>
@endsection
