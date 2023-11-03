@extends('layout.app')
@section('title','pengeluaran  /  tambah')
@section('pagename','Tambahkan pengeluaran')
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
            <form class="row g-3" method="post" action="{{ route('pengeluaran.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="jenis_pengeluaran" class="form-label">Jenis pengeluaran</label>
                    <input type="text" class="form-control @error('jenis_pengeluaran') is-invalid @enderror" id="jenis_pengeluaran" name="jenis_pengeluaran" value="{{ old('jenis_pengeluaran') }}" placeholder="Masukkan jenis pengeluaran">
                    @error('jenis_pengeluaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="deskripsi" class="form-label">tanggal dingunakan</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="col-12">
                    <label for="jumlah" class="form-label">jumlah</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" >
                    @error('jumlah')
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
