@extends('layout.app')
@section('title','surat  /  tambah')
@section('pagename','Tambahkan surat')
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
            <h5 class="card-title">Tambah</h5>
            <form class="row g-3" method="post" action="{{ route('surat.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="pengirim" class="form-label">kode surat</label>
                    <input type="text" class="form-control @error('kode_surat') is-invalid @enderror" id="kode_surat" name="kode_surat" value="{{ old('kode_surat') }}" placeholder="Masukkan kode surat">
                    @error('kode_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="deskripsi" class="form-label">tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                    @error('tangggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-12">
                    <label for="pengirim" class="form-label">pengirim</label>
                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" value="{{ old('pengirim') }}" placeholder="Masukkan pengirim">
                    @error('pengirim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="perihal" class="form-label">perihal</label>
                    <textarea type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal">{{ old('perihal') }}</textarea>
                    @error('perihal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
