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
            <div class="d-flex align-items-center">
              <div class="border-end pe-4 border-muted border-opacity-10">
                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                  $2,340<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                </h3>
                <p class="mb-0 text-dark">Today’s Sales</p>
              </div>
              <div class="ps-4">
                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                  35%<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                </h3>
                <p class="mb-0 text-dark">Overall Performance</p>
              </div>
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
            <i class="cc BTC text-white fs-7" title="BTC"></i>
          </div>
          <h6 class="mb-0 ms-3">BTC</h6>
          <div class="ms-auto text-primary d-flex align-items-center">
            <i class="ti ti-trending-up text-primary fs-6 me-1"></i>
            <span class="fs-2 fw-bold">+ 2.30%</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">0.1245</h3>
          <span class="fw-bold">$1,015.00</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-danger-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
            <i class="cc ETH text-white fs-7" title="ETH"></i>
          </div>
          <h6 class="mb-0 ms-3">ETH</h6>
          <div class="ms-auto text-danger d-flex align-items-center">
            <i class="ti ti-trending-up text-danger fs-6 me-1"></i>
            <span class="fs-2 fw-bold">+ 3.20%</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">0.5620</h3>
          <span class="fw-bold">$2,110.00</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-success-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-success d-flex align-items-center justify-content-center">
            <i class="cc LTC text-white fs-7" title="LTC"></i>
          </div>
          <h6 class="mb-0 ms-3">LTC</h6>
          <div class="ms-auto text-info d-flex align-items-center">
            <i class="ti ti-trending-down text-success fs-6 me-1"></i>
            <span class="fs-2 fw-bold text-success">+ 3.20%</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">1.200</h3>
          <span class="fw-bold">$1,100.00</span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card bg-warning-subtle shadow-none">
      <div class="card-body p-4">
        <div class="d-flex align-items-center">
          <div class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
            <i class="cc XRP text-white fs-7" title="XRP"></i>
          </div>
          <h6 class="mb-0 ms-3">XRP</h6>
          <div class="ms-auto text-info d-flex align-items-center">
            <i class="ti ti-trending-down text-warning fs-6 me-1"></i>
            <span class="fs-2 fw-bold text-warning">+ 2.20%</span>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4">
          <h3 class="mb-0 fw-semibold fs-7">1.150</h3>
          <span class="fw-bold">$2,150.00</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body">
        <h5 class="card-title fw-semibold">Revenue Updates</h5>
        <p class="card-subtitle mb-4">Overview of Profit</p>
        <div class="d-flex align-items-center">
          <div class="me-4">
            <span class="round-8 text-bg-primary rounded-circle me-2 d-inline-block"></span>
            <span class="fs-2">Footware</span>
          </div>
          <div>
            <span class="round-8 text-bg-secondary rounded-circle me-2 d-inline-block"></span>
            <span class="fs-2">Fashionware</span>
          </div>
        </div>
        <div id="revenue-chart" class="revenue-chart"></div>
      </div>
    </div>
  </div>
</div>
@stop