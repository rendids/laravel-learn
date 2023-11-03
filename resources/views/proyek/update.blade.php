@extends('layout.app')
@section('title','proyek  /  edit')
@section('pagename','Edit proyek')
@section('content')
<div class="col-lg">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    </script>
    @endif
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit</h5>
          <form class="row g-3" method="post" action="{{ route('proyek.update', $proyek->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <form class="row g-3" method="post" action="{{ route('proyek.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="nama_proyek" class="form-label">nama proyek</label>
                  <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" value="{{ $proyek->nama_proyek }}" placeholder="masukan nama proyek">
                  @error('nama_proyek')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="col-12">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="" placeholder="masukan deskripsi">{{ $proyek->deskripsi }}</textarea>
                  @error('deskripsi')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="col-12">
                  <label for="deskripsi" class="form-label">mulai</label>
                  <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ $proyek->tanggal_mulai }}">
                  @error('tanggal_mulai')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
                <div class="col-12">
                  <label for="deskripsi" class="form-label">selesai</label>
                  <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="deskripsi" name="tanggal_selesai" value="{{ $proyek->tanggal_selesai }}">
                  @error('tanggal_selesai')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
                </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" >Submit</button>
              {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
            </div>
          </form>
        </div>
      </div>
@endsection
