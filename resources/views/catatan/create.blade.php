@extends('layout.app')
@section('title','catatan  /  tambah')
@section('pagename','Tambahkan catatan')
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
            <form class="row g-3" method="post" action="{{ route('catatan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <textarea type="text" class="form-control @error('catat') is-invalid @enderror" id="catat" name="catat" value="{{ old('catat') }}" placeholder="Masukkan catat"></textarea>
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
</div>
@endsection
