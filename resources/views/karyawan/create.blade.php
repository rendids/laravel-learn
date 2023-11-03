@extends('layout.app')
@section('title','karyawan  /  tambah')
@section('pagename','Tambahkan karyawan')
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
            <form class="row g-3" method="post" action="{{ route('karyawan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="gambar" class="form-label">Pilih gambar</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" id="jk" value="Laki-laki">
                        <label class="form-check-label" for="jk">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" id="gjk" value="Perempuan">
                        <label class="form-check-label" for="jk">
                            Perempuan
                        </label>
                    </div>
                    @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="departemen" class="form-label">departemen</label>
                    <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id" aria-label="Default select example">
                        <option selected disabled>Pilih departemen</option>
                        @foreach ($depar as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('departemen_id')
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
