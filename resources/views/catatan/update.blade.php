@extends('layout.app')
@section('title','catatan  /  edit')
@section('pagename','Edit catatan')
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
          <form class="row g-3" method="post" action="{{ route('catatan.update', $karyawan->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="col-12">
                    <label for="catat" class="form-label">catatan</label>
                    <textarea type="text" class="form-control @error('catat') is-invalid @enderror" id="catat" name="catat">{{ $karyawan->catat }}</textarea>
                    @error('catat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
