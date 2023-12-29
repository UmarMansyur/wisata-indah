@extends('layout.admin.main')
@section('content')
<div id="main-wrapper">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
    <div class="position-relative z-index-5">
      <div class="row">
        <div class="col-xl-7 col-xxl-8">
          <a href="../index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
            <img src="/images/logo.png" class="dark-logo" alt="Logo-Dark" width="40" />
            <img src="/images/logo.png" class="light-logo" alt="Logo-light" />
          </a>
          <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
            <img src="/assets/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
          </div>
        </div>
        <div class="col-xl-5 col-xxl-4">
          <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
            <div class="col-sm-8 col-md-6 col-xl-9">
              <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang di Madura Indah Wisata</h2>
              <p class=" mb-9">Halaman Administrator</p>
              <div class="position-relative text-center my-4">
                <p class="mb-0 fs-4 px-3 d-inline-block text-bg-white text-dark z-index-5 position-relative">
                  Tekan Masuk Untuk Melanjutkan
                </p>
                <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
              </div>
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                    <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label text-dark" for="flexCheckChecked">
                      Ingat Saya
                    </label>
                  </div>
                  <a class="text-primary fw-medium" href="AuthenticationForgotPassword.html">Lupa Password ?</a>
                </div>
                <a href="../index.html" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                  <i class="bx bxs-lock-open"></i> Masuk
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<div class="dark-transparent sidebartoggler"></div>
@stop