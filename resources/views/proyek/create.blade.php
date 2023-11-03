@extends('layout.app')
@section('title','proyek  /  tambah')
@section('pagename','Tambahkan proyek')
@section('content')
<div class="col-lg">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tambah</h5>
        <form class="row g-3" method="post" action="{{ route('proyek.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="nama_proyek" class="form-label">Nama Proyek</label>
                <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" value="{{ old('nama_proyek') }}" placeholder="Masukkan nama proyek">
                @error('nama_proyek')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="tanggal_mulai" class="form-label">Mulai</label>
                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                @if ($errors->has('tanggal_mulai'))
                  <div class="text-danger">Isi tanggal mulai</div>
                @endif
              </div>

              <div class="col-12">
                <label for="tanggal_selesai" class="form-label">Selesai</label>
                <input type="date" class="form-control @error('tanggal_selesai') is-validate @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                @error('tanggal_selesai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                @if (old('tanggal_selesai'))
                    <div class="text-success">{{ \Carbon\Carbon::parse(old('tanggal_selesai'))->locale('id')->isoFormat('DD MMMM YYYY') }}</div>
                @endif
            </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
    </div>

  </div>
</div>
@endsection
