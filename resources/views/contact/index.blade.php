@extends('layout.landing_page.main')
@section('content')


<!-- Page Header Start !-->
<div class="page-breadcrumb-area page-bg" style="background-image: url('images/cover-about.jpg')">
  <!-- <div class="page-overlay"></div> -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="breadcrumb-wrapper">
                  <div class="page-heading">
                      <h3 class="page-title">Looking for joy?</h3>
                  </div>
                  <div class="breadcrumb-list">
                      <ul>
                          <li><a href="/">Home</a></li>
                          <li class="active"><a href="#">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Page Header End !-->

<!-- Contact-info Section Start !-->
<div class="contact-info-area">
    <div class="container">
        <div class="row gx-xl-5 gy-4">
            <div class="col-xl-4 col-md-6">
                <div class="icon-card style-2">
                    <div class="icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h2 class="title">Nomor Telepon</h2>
                        <div class="info">
                            <a href="tel:+62-878-5003-5899" class="desc">(+62) 878-5003-5899</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="icon-card style-2">
                    <div class="icon">
                        <i class="fa-solid fa-calendar"></i>
                    </div>
                    <div class="content">
                        <h2 class="title">Mail address</h2>
                        <div class="info">
                            <a href="mailto:maduraindahwisata@gmail.com" class="desc">maduraindahwisata@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="icon-card style-2">
                    <div class="icon">
                        <i class="fa-solid fa-message"></i>
                    </div>
                    <div class="content">
                        <h2 class="title">Alamat</h2>
                        <div class="info">
                            <span class="address-desc">Desa Tlambah, Karang Penang Sampang,</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact-info Section End -->
@stop