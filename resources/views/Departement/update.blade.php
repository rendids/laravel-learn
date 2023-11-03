@extends('layout.app')
@section('title','departemen  /  edit')
@section('pagename','Edit departemen')
@section('content')
<div class="col-lg">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'sukses',
            text: '{{ session("success") }}',
        });
    </script>
    @endif
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit</h5>
          <form class="row g-3" method="post" action="{{ route('departemen.update', $departemen->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-12">
              <label for="name" class="form-label">Masukkan Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $departemen->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
              <label for="location" class="form-label">Masukkan lokasi</label>
              <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ $departemen->location }}">
              @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
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
