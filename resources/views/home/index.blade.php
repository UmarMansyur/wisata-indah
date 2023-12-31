@extends('layout.landing_page.main')
@section('content')

<div class="slider-area style-1"
  style="background-image: url('images/hero-section/bg-1.jpg'); background-size: cover; background-position: center center;">
  <img class="banner-shape-1 wow slideInLeft" src="images/shape/wave.png" alt="Shape">
  <img class="banner-shape-2 wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms"
    src="images/shape/send-msg.png" alt="Shape">
  <img class="banner-shape-3 wow slideInDown" src="images/shape/sky.png" alt="Shape">
  <img class="banner-shape-4 wow zoomInUp" src="images/shape/dots.png" alt="Shape">
  <div class="slider-wrapper">
    <div>
      <div class="single-slider">
        <div class="container h-100 align-self-center">
          <div class="content-wrapper">
            <div class="row h-100">
              <div class="col-md-5 align-self-center order-2 order-md-1">
                <div class="slider-content-wrapper">
                  <div class="slider-content">
                    <img class="topbar-shape" src="images/shape/highlight.png" alt="Shape">
                    <span class="slider-short-title">Travel & Tour</span>
                    <h1 class="slider-title">Madura Indah Wisata</h1>
                    <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
                    <p class="slider-short-desc">Temukan tempat wisata terbaik di Madura. Dengan harga terjangkau dan
                      pelayanan yang memuaskan.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-7 align-self-center order-1 order-md-2">
                <div class="slider-image">
                  <img src="images/home-2.jpg" alt="feature image" data-wow-delay="2.5s" width="615" height="798"
                    class="d-none rouded-3 d-md-block wow slideInRight img-thumbnail p-4">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="location-filter-wrapper">
                <div class="location-filter-card style-1">
                  <form action="#">
                    <div class="single-item">
                      <label for="state" class="select-location">Lokasi</label>
                      <select class="select-location-inner" id="state" name="state">
                        <option value="AL">Sumenep</option>
                        <option value="WY">Pamekasan</option>
                        <option value="WY">Sampang</option>
                        <option value="WY">Bangkalan</option>
                      </select>
                    </div>
                    <div class="single-item">
                      <label class="datepicker" for="datepicker">Tanggal</label>
                      <input type="text" id="datepicker" value="26 Mar, Fri">
                    </div>
                    <div class="single-item price-range-inner">
                      <span class="priceLabel">Harga</span>
                      <span id="priceValue">Rp.<span id="min-value"></span>-<span id="max-value"></span></span>
                      <div class="priceSlider">
                        <div class="min-max-range">
                          <label for="min">Harga Terendah</label>
                          <input type="range" min="0" max="100000" value="{{ number_format(0, 0, ',', '.') }}"
                            class="range" id="min" name="min">
                          <label for="min">Harga Tertinggi</label>
                          <input type="range" min="100000" max="10000000" value="{{ number_format(0, 0, ',', '.') }}"
                            class="range" id="max" name="max">
                        </div>
                      </div>
                    </div>
                    <button class="style-1" type="submit"><i class="icon-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="location-slider-area style-1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <div class="sec-content">
            <img class="topbar-shape-2" src="images/shape/three-line-shape.png" alt="Shape">
            <span class="short-title">Destinasi</span>
            <h2 class="title">Destinasi Populer</h2>
            <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
          </div>
          <div class="location-slider-arrow">
            <button type="button" class="location-arrow-btn prev-btn" id="trigger_location_prev"><i
                class="fa-solid fa-arrow-left"></i></button>
            <button type="button" class="location-arrow-btn next-btn" id="trigger_location_next"><i
                class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="location-slider-wrapper" id="location-slider-wrapper">
      @foreach($tour as $t)
      <div class="location-card style-1 wow fadeInUp" data-wow-delay="0s">
        <div class="image-wrapper">
          <a class="image-inner" href="destination-details.html">
            <img src="{{ asset('storage/'.$t->thumbnail) }}" alt="Location Image">
          </a>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">{{ $t->title }}</a></h3>
            <a href="{{ route('detail destination', encrypt($t->id)) }}" class="btn-details">Selengkapnya</a>
            ><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@include('layout.landing_page.about')
<div class="location-area style-1">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title  align-content-center justify-content-center text-center">
          <div class="sec-content">
            <span class="short-title">Tempat Wisata</span>
            <h2 class="title">Carilah tempat wisata yang sesuai dengan anda</h2>
            <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
          </div>
        </div>
      </div>
    </div>
    <div class="row gy-4">
      @foreach($tours as $item)
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{$loop->iteration}}s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="{{ route('detail destination', encrypt($item->id)) }}">
                <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="Location Image">
              </a>
            </div>
            <div class="favourite-icon">
              <i class="fa-solid fa-heart"></i>
            </div>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
                @foreach ($item->costTour as $cost)
                <p class="price mb-0">Rp.
                    <span class="counter">{{ number_format($cost->price, 0, ',', '.') }}</span> 
                    <small class="text-dark" style="font-size: 12px">{{ $cost->passenger->name }}</small>
                </p>
                @endforeach
                <h3 class="content-title"><a href="{{ route('detail destination', encrypt($item->id)) }}">{{ $item->title }}</a></h3>
                <div class="time-zone">
                    <div class="time-zone-inner">
                        <i class="fa-solid fa-location-dot"></i>
                        <p class="title">{{ $item->address }}</p>
                    </div>
                    <div class="time-zone-inner">
                        <i class="fa-solid fa-clock"></i>
                        <p class="title"> {{ $item->duration }} {{ $item->unit_duration }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<div class="why-choose-us-area style-1">
  <img class="shape-1 wow zoomInDown" src="images/shape/half-circle-2.png" alt="Shape">
  <img class="shape-2 wow zoomInUp" src="images/shape/dots.png" alt="Shape">
  <div class="container">
    <div class="row gy-4">
      <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay=".4s">
        <div class="section-title">
          <div class="sec-content">
            <span class="short-title">Mengapa memilih kami</span>
            <h2 class="title">Dapatkan pengalaman terbaik serta pelayanan yang memuaskan</h2>
            <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
          </div>
          <div class="sec-desc">
            <p class="desc">Madura Indah Wisata terletak di Kabupaten Sampang.
          </div>
          <div class="sec-btn">
            <a href="#" class="theme-btn">Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 align-self-center wow fadeInDown" data-wow-delay=".6s">
        <div class="image-wrapper">
          <img src="images/traveller.svg" alt="Why Choose Us">
        </div>
      </div>
      <div class="col-xl-4 wow fadeInRight" data-wow-delay=".4s">
        <div class="info-wrapper">
          <div class="info-card style-1">
            <div class="icon-wrapper">
              <img src="images/icon/folding-map.png" alt="Icon">
            </div>
            <div class="content">
              <h6 class="title">Pemandu Wisata</h6>
              <p class="desc">Kami menyediakan pemandu wisata yang berpengalaman</p>
            </div>
          </div>
          <div class="info-card style-1">
            <div class="icon-wrapper">
              <img src="images/icon/ticket.png" alt="Icon">
            </div>
            <div class="content">
              <h6 class="title">Harga terjangkau</h6>
              <p class="desc">Anda tidak perlu memikirkan biaya yang harus dikeluarkan. Karena kami bergerak untuk
                memberikan pelayanan terbaik dengan harga terjangkau</p>
            </div>
          </div>
          <div class="info-card style-1">
            <div class="icon-wrapper">
              <img src="images/icon/calender.png" alt="Icon">
            </div>
            <div class="content">
              <h6 class="title">Pemesanan Tiket Online</h6>
              <p class="desc">Fasilitas krusial yang kami sediakan adalah pemesanan tiket secara online. Anda tidak
                perlu repot-repot untuk datang ke tempat kami</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layout.landing_page.step')
<div class="cta-area style-1" style="background-image: url('images/cta-area/bg-1.jpg'); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-md-5 text-start wow fadeInLeft">
        <div class="section-title">
          <div class="sec-content">
            <span class="short-title">Platform digital kami</span>
            <h2 class="title">Dapatkan potongan harga 10% untuk pemesanan pertama anda</h2>
            <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
          </div>
          <div class="sec-desc">
            <p class="desc">Platform digital kami akan memudahkan anda untuk memesan tiket pariwisata untuk pulau madura
              yang dapat anda booking dimanapun dan kapanpun</p>
          </div>
          <div class="sec-btn">
            <a href="#" class="theme-btn">Cari Destinasi</a>
          </div>
        </div>
      </div>
      <div class="col-md-7 text-end wow fadeInRight">
        <div class="image-wrapper">
          <img class="wave-shape" src="images/shape/wave-black.png" alt="Shape">
          <img class="top-circle" src="images/shape/circle-1.png" alt="Shape">
          <img class="bottom-circle" src="images/shape/circle-2.png" alt="Shape">
          <img class="side-img img-inner" src="images/mobile.png" alt="Phone VIew">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="location-area style-2">
  <img class="bg-bottom-shape" src="images/shape/bottom-shape.png" alt="Shape">
  <div class="container">
    <div class="section-title  align-content-center justify-content-center text-center">
      <div class="sec-content">
        <span class="short-title">Kabupaten</span>
        <h2 class="title">Kabupaten yang terdapat di Pulau Madura</h2>
        <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
      </div>
    </div>
    <div class="location-card-wrapper">
      <div class="row gy-4">

        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
          <div class="location-image-card">
            <a href="destination-details.html" class="img-wrapper">
              <img src="images/bangkalan.jpg" alt="Place Image">
            </a>
            <div class="content-inner">
              <h6 class="city"><a href="destination-details.html">Bangkalan</a></h6>
              <p class="duration">{{ $data['bangkalan'] }} Wisata</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
          <div class="location-image-card">
            <a href="destination-details.html" class="img-wrapper">
              <img src="images/sampang.jpg" alt="Place Image">
            </a>
            <div class="content-inner">
              <h6 class="city"><a href="destination-details.html">Sampang</a></h6>
              <p class="duration">{{ $data['sampang'] }} Wisata</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
          <div class="location-image-card">
            <a href="destination-details.html" class="img-wrapper">
              <img src="images/pamekasan.jpg" alt="Place Image">
            </a>
            <div class="content-inner">
              <h6 class="city"><a href="destination-details.html">Pamekasan</a></h6>
              <p class="duration">{{ $data['pamekasan'] }} Wisata</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0s">
          <div class="location-image-card">
            <a href="destination-details.html" class="img-wrapper">
              <img src="images/sumenep.jpg" alt="Place Image">
            </a>
            <div class="content-inner">
              <h6 class="city"><a href="destination-details.html">Sumenep</a></h6>
              <p class="duration">{{ $data['sumenep'] }} Wisata</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sec-btn justify-content-center text-center">
      <a class="theme-btn" href="/destination">Tampilkan Semua</a>
    </div>
  </div>
</div>
@stop