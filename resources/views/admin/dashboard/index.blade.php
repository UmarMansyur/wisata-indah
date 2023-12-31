@extends('layout.admin.main')
@section('content')
<div class="row">
  <div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
      <div class="card-body position-relative">
        <div class="row">
          <div class="col-sm-7">
            <div class="d-flex align-items-center mb-7">
              <div class="rounded-circle overflow-hidden me-6">
                <img src="/assets/images/profile/user-1.jpg" alt="" width="40" height="40">
              </div>
              <h5 class="fw-semibold mb-0 fs-5">Welcome back Mathew Anderson!</h5>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="welcome-bg-img mb-n7 text-end">
              <img src="/assets/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-primary-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-primary d-flex align-items-center justify-content-center">
            <i class="ti ti-users text-white fs-7" title="Users"></i>
          </div>
          <h6 class="mb-0 ms-3">Jumlah Administrator</h6>

        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">{{ $user }}</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-danger-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
            <i class="ti ti-shopping-cart text-white fs-7" title="Orders"></i>
          </div>
          <h6 class="mb-0 ms-3">Jumlah Pemesanan</h6>
          <div class="ms-auto text-danger d-flex align-items-center">
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">{{ $order }}</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-success-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-success d-flex align-items-center justify-content-center">
            <i class="ti ti-map-2 text-white fs-7" title="map"></i>
          </div>
          <h6 class="mb-0 ms-3">Jumlah Destinasi</h6>

        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">{{ $tour }}</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-warning-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
            <i class="ti ti-cash text-white fs-7" title="money"></i>
          </div>
          <h6 class="mb-0 ms-3">Total Pendapatan</h6>
         
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">{{ $estimation }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>

@stop