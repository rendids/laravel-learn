@extends('layout.app')
@section('title','')
@section('pagename','Dashboard')
@section('content')
@if (session('error'))
<script>
    toastr.error('{{ session("error") }}');
</script>
@endif

    @if(session('message'))
    <script>
        toastr.success('{{ session("message") }}');
    </script>
    @endif

      <section class="section">
        <div class="row">

            <div class="col-lg-3">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">karyawan <i class="bi bi-people fs-5"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $karyawan)
                            <h3 class="text-primary">{{ $karyawan }}</h3>
                        @else
                            <h3 class="text-danger">tidak ada data</h3>
                        @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-3">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">departemen <i class="bi bi-diagram-3 fs-5"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $departemen)
                        <h3 class="text-primary">{{ $departemen }}</h3>
                    @else
                        <h3 class="text-danger">tidak ada data</h3>
                    @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-3">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">proyek <i class="ri ri-clipboard-line"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $proyek)
                            <h3 class="text-primary">{{ $proyek }}</h3>
                        @else
                            <h3 class="text-danger">tidak ada data</h3>
                        @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-3">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">penugasan <i class="ri ri-todo-line"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $penugasan)
                        <h3 class="text-primary">{{ $penugasan }}</h3>
                    @else
                        <h3 class="text-danger">tidak ada data</h3>
                    @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">catatan <i class="bi bi-card-text"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $catatan)
                            <h3 class="text-primary">{{ $catatan }}</h3>
                        @else
                            <h3 class="text-danger">tidak ada data</h3>
                        @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">pengeluaran <i class="bi bi-cash-stack"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $keluar)
                            <h3 class="text-primary">{{ $keluar }}</h3>
                        @else
                            <h3 class="text-danger">tidak ada data</h3>
                        @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">surat masuk <i class="bbi bi-mailbox"></i></h5>
                  <div class="d-flex align-items-center">
                      <div class="ps-3">
                        @if ( $catatan)
                            <h3 class="text-primary">{{ $surat }}</h3>
                        @else
                            <h3 class="text-danger">tidak ada data</h3>
                        @endif
                      </div>
                    </div>
                </div>
              </div>

            </div>

        </div>
      </section>
@endsection
