@extends('layout.app')
@section('title','penugasan  /  tambah')
@section('pagename','Tambahkan penugasan')
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
        <form class="row g-3" method="post" action="{{ route('penugasan.store') }}" enctype="multipart/form-data">
            @csrf
              <div class="col-12">
                <label for="departemen" class="form-label">karyawan</label>
                <select class="form-select @error('karyawan_id') is-invalid @enderror" name="karyawan_id" aria-label="Default select example">
                    <option selected disabled> pilih karyawan</option>
                    @foreach ($depar as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('karyawan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
              <div class="col-12">
                <label for="departemen" class="form-label">proyek</label>
                <select class="form-select @error('proyek_id') is-invalid @enderror" name="proyek_id" aria-label="Default select example">
                    <option selected disabled>pilih proyek</option>
                    @foreach ($i as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_proyek }}</option>
                    @endforeach
                </select>
                @error('proyek_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="deskripsi" class="form-label">deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
            </div>
          </form>
    </div>

  </div>
</div>
@endsection
