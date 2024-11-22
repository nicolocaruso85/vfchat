@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<div class="row">
  <div class="col-xxl-8 mb-6 order-0">
    <div class="card">
      <div class="d-flex align-items-start row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Benvenuto {{ auth()->user()->name }}! 🎉</h5>
            <p class="mb-6">Utilizza il menu laterale per navigare nel sito.</p>

            <a href="javascript:;" class="btn btn-sm btn-outline-primary">Il mio profilo</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-6">
            <img src="{{asset('assets/img/illustrations/man-with-laptop.png')}}" height="175" class="scaleX-n1-rtl" alt="View Badge User">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">Visualizza</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Punti vendita</p>
            <h4 class="card-title mb-3">222</h4>
            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> +10%</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between mb-4">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="wallet info" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">Visualizza</a>
                </div>
              </div>
            </div>
            <p class="mb-1">Dipendenti</p>
            <h4 class="card-title mb-3">600</h4>
            <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i> +24%</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Utenti creati -->
  <div class="col-12 col-xxl-12 order-2 order-md-3 order-xxl-2 mb-6">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-lg-8">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Utenti creati</h5>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="totalRevenue" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                <a class="dropdown-item" href="javascript:void(0);">Esporta dati</a>
              </div>
            </div>
          </div>
          <div id="totalRevenueChart" class="px-3"></div>
        </div>
        <div class="col-lg-4 d-flex align-items-center">
          <div class="card-body px-xl-9">
            <div class="text-center mb-6">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">
                  <script>
                  document.write(new Date().getFullYear())

                  </script>
                </button>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);">2024</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">2023</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">2022</a></li>
                </ul>
              </div>
            </div>

            <div id="growthChart"></div>
            <div class="text-center fw-medium my-6">Totale utenti creati</div>

            <div class="d-flex gap-3 justify-content-between">
              <div class="d-flex">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-2 bg-label-primary"><i class="bx bx-user bx-lg text-primary"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>
                    <script>
                    document.write(new Date().getFullYear())

                    </script>
                  </small>
                  <h6 class="mb-0">112</h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="avatar me-2">
                  <span class="avatar-initial rounded-2 bg-label-info"><i class="bx bx-user bx-lg text-info"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small>
                    <script>
                    document.write(new Date().getFullYear() - 1)

                    </script>
                  </small>
                  <h6 class="mb-0">75</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
