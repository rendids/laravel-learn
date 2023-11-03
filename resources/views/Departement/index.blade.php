@extends('layout.app')

@section('title','departemen')
@section('pagename','Tabel departemen')
@section('content')
<div class="card">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'sukses',
            text: '{{ session("success") }}',
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'waduh',
            text: '{{ session("error") }}',
        })
    </script>
    @endif
    <div class="card-body">
      <h5 class="card-title">Daftar karyawan</h5>
      <div class="card-body d-flex justify-content-end">
        <a href="{{ route('departemen.create') }}" class="btn btn-primary">tambah</a>
      </div>

      <!-- Bordered Table -->
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">lokasi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if (count($karyawans) > 0)
            @foreach ($karyawans as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->location}}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('departemen.edit', ['id' => $item->id]) }}">Edit</a>
                <form id="deleteForm{{ $item->id }}" action="{{ route('departemen.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline">
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
                <td colspan="4" class="text-danger">tidak ada data</td>
            </tr>
            @endif
        </tbody>
      </table>
@endsection
