@extends('layout.app')
@section('title','karyawan  /  edit')
@section('pagename','Edit karyawan')
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
          <form class="row g-3" method="post" action="{{ route('karyawan.update', $karyawan->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-12">
                <img src="{{ asset('storage/gambar/'.$karyawan->gambar) }}" alt="" srcset="" class="rounded-circle" width="50">
                <label for="gambar" class="form-label">Pilih Gambar</label>
              <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
              @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="col-12">
              <label for="nama" class="form-label">Masukkan Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $karyawan->nama }}">
              @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="col-12">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-laki" {{ $karyawan->jk == 'Laki-laki' ? 'checked' : '' }}>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" {{ $karyawan->jk == 'Perempuan' ? 'checked' : '' }}>
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
            </div>
            <div class="col-12">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat">{{ $karyawan->alamat }}</textarea>
              @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="col-12">
              <label for="departemen" class="form-label">departemen</label>
              <select class="form-select " name="departemen_id" aria-label="Default select example">
                <option value="{{ $karyawan->departemen_id}}">{{ $karyawan->departemen->name }}</option>
                @foreach ($depar as $item)
                    <option value="{{ $item->id }} ">{{ $item->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" >Submit</button>
              {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
            </div>
          </form>
        </div>
      </div>
@endsection
