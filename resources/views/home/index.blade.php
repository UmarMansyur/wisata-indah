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
                  <img src="images/home-2.jpg" alt="feature image"
                    data-wow-delay="2.5s" width="615" height="798" class="d-none rouded-3 d-md-block wow slideInRight img-thumbnail p-4">
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
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay="0s">
        <div class="image-wrapper">
          <a class="image-inner" href="destination-details.html">
            <img src="images/a.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay=".4s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/b.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay=".8s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/c.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay="1.2s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/d.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay="0s">
        <div class="image-wrapper">
          <a class="image-inner" href="destination-details.html">
            <img src="images/e.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay=".4s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/f.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay=".8s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/g.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="location-card style-1 wow fadeInUp" data-wow-delay="1.2s">
        <div class="image-wrapper">
          <a href="destination-details.html" class="image-inner">
            <img src="images/h.jpg" alt="Location Image">
          </a>
          <div class="rating">
            <div class="ratting-inner">
              <span><i class="fa-solid fa-star"></i></span>
              <span class="counter">3.5</span>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="content-inner">
            <h3 class="content-title"><a href="destination-details.html">America – Grand canyon,</a></h3>
            <a href="destination-details.html" class="icon"><i class="icon-up-arrow"></i></a>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
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
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/a.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon active"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <span class="price">Rp. 25.000</span>
              <h3 class="content-title"><a href="tour-details.html">Pantai Sembilan</a></h3>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Sumenep, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/b.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <Span class="price">Rp. 15.000</Span>
              <h3 class="content-title"><a href="tour-details.html">Pantai Lombang</a></h3>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Sumenep, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/c.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon active"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <h5 class="price">Rp. 10.000</h5>
              <span class="content-title"><a href="tour-details.html">Vihara Avalokitesvara</a></span>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Pamekasan, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/d.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <h5 class="price">Rp. 20.000</h5>
              <h3 class="content-title"><a href="tour-details.html">Jembatan Mangrove</a></h3>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Pamekasan, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.2s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/e.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon active"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <h5 class="price">Rp. 15.000</h5>
              <h3 class="content-title"><a href="tour-details.html">Pantai Gili Labak</a></h3>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Sumenep, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
      <!--- Single Location Start !-->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.6s">
        <div class="location-card style-2">
          <div class="image-wrapper">
            <div class="image-inner">
              <a href="tour-details.html"><img src="images/f.jpg" alt="Location Image"></a>
            </div>
            <div class="rating">
              <div class="ratting-inner">
                <span><i class="fa-solid fa-star"></i></span>
                <span class="counter">3.5</span>
              </div>
            </div>
            <a href="#" class="favourite-icon"><i class="fa-solid fa-heart"></i></a>
          </div>
          <div class="content-wrapper">
            <div class="content-inner">
              <h5 class="price">Rp. 20.000</h5>
              <h3 class="content-title"><a href="tour-details.html">Bukit Arosbaya</a></h3>
              <div class="time-zone">
                <div class="time-zone-inner">
                  <i class="fa-solid fa-location-dot"></i>
                  <p class="title">Bangkalan, Madura</p>
                </div>
                <div class="time-zone-inner">
                  <i class="fa-solid fa-clock"></i>
                  <p class="title">1 Days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- Single Location End !-->
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
<div class="cta-area style-1" style="background-image: url('images/cta-area/bg-1.jpg')">
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
            <p class="desc">Platform digital kami akan memudahkan anda untuk memesan tiket pariwisata untuk pulau madura yang dapat anda booking dimanapun dan kapanpun</p>
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
          <img class="side-img" src="images/mobile.png" alt="Phone VIew">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="testimonial-slider-area style-1">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 wow fadeInLeft">
        <div class="testimonial-slider-image-wrapper">
          <div class="single-img-wrapper style-1">
            <div class="img-inner">
              <div class="image">
                <img src="images/testimonial/user-1.png" alt="User Image">
              </div>
              <div class="content">
                <span class="desc"><i class="fa-solid fa-location-dot"></i>Colombia</span>
              </div>
            </div>
          </div>
          <div class="single-img-wrapper style-2">
            <div class="img-inner">
              <div class="image">
                <img src="images/testimonial/user-3.png" alt="User Image">
              </div>
              <div class="content">
                <span class="desc"><i class="fa-solid fa-location-dot"></i>Russia</span>
              </div>
            </div>
          </div>
          <div class="single-img-wrapper style-3">
            <div class="img-inner">
              <div class="image">
                <img src="images/testimonial/user-2.png" alt="User Image">
              </div>
              <div class="content style-2">
                <span class="desc"><i class="fa-solid fa-location-dot"></i>Istanbul</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 wow fadeInRight">
        <div class="testimonial-content-wrapper">
          <div class="section-title">
            <div class="sec-content">
              <span class="short-title">Testimoni Pelanggan</span>
              <h2 class="title">Apa kata mereka tentang kami</h2>
              <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
            </div>
          </div>
          <div class="testimonial-slider-wrapper" id="testimonial_one">
            <!-- Single Slider Content Start -->
            <div>
              <div class="testimonial-card style-1">
                <div class="content-wrapper">
                  <div class="content">
                    <p class="text">“Saya sangat puas dengan layanan Madura Indah Wisata selama perjalanan saya di Pulau Madura. Tim mereka sangat profesional dan ramah, memberikan informasi yang jelas dan membantu kami menjelajahi keindahan Madura dengan nyaman. Pengalaman wisata kami menjadi lebih berkesan berkat perhatian dan layanan prima mereka.”</p>
                  </div>
                  <div class="user-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Slider Content End -->
            <!-- Single Slider Content Start -->
            <div>
              <div class="testimonial-card style-1">
                <div class="content-wrapper">
                  <div class="content">
                    <p class="text">“Madura Indah Wisata menawarkan beragam paket wisata yang menarik. Mulai dari kunjungan ke tempat-tempat wisata terkenal hingga acara budaya lokal, setiap paket didesain dengan baik dan sesuai dengan keinginan pelanggan. Pengalaman wisata kami menjadi lebih berwarna berkat pilihan paket yang menarik.”</p>
                  </div>
                  <div class="user-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Slider Content End -->
            <!-- Single Slider Content Start -->
            <div>
              <div class="testimonial-card style-1">
                <div class="content-wrapper">
                  <div class="content">
                    <p class="text">“Saya ingin mengapresiasi pemandu wisata dari Madura Indah Wisata yang sangat ahli dan ramah. Mereka tidak hanya memberikan informasi yang informatif tetapi juga membuat perjalanan kami menjadi lebih menyenangkan dengan humor dan keramahan mereka. Sungguh pengalaman yang menyenangkan!.”</p>
                  </div>
                  <div class="user-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Slider Content End -->
            <!-- Single Slider Content Start -->
            <div>
              <div class="testimonial-card style-1">
                <div class="content-wrapper">
                  <div class="content">
                    <p class="text">“Madura Indah Wisata memiliki kelebihan dalam fleksibilitas. Mereka dengan mudah menyesuaikan itinerary sesuai dengan keinginan kami dan memberikan rekomendasi yang sesuai dengan preferensi kami. Hal ini membuat perjalanan kami menjadi lebih personal dan sesuai dengan ekspektas.”</p>
                  </div>
                  <div class="user-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Slider Content End -->
            <!-- Single Slider Content Start -->
            <div>
              <div class="testimonial-card style-1">
                <div class="content-wrapper">
                  <div class="content">
                    <p class="text">“Keamanan dan kenyamanan selalu menjadi prioritas utama Madura Indah Wisata. Saya merasa aman sepanjang perjalanan, dan mereka memberikan perhatian khusus terhadap detail seperti transportasi yang nyaman dan akomodasi yang bersih. Ini memberikan kami kedamaian pikiran untuk menikmati liburan tanpa khawatir.”</p>
                  </div>
                  <div class="user-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Slider Content End -->
          </div>
          <div class="testimonial-user-slider">
            <div class="testimonial-user-wrapper ">
              <!-- Single User Wrapper Start -->
              <div class="single-user">
                <img src="images/testimonial/user-4.png" alt="user" />
              </div>
              <!-- Single User Wrapper End -->

              <!-- Single User Wrapper Start -->
              <div class="single-user">
                <img src="images/testimonial/user-5.png" alt="user" />
              </div>
              <!-- Single User Wrapper End -->

              <!-- Single User Wrapper Start -->
              <div class="single-user">
                <img src="images/testimonial/user-6.png" alt="user" />
              </div>
              <!-- Single User Wrapper End -->

              <!-- Single User Wrapper Start -->
              <div class="single-user">
                <img src="images/testimonial/user-7.png" alt="user" />
              </div>
              <!-- Single User Wrapper End -->

              <!-- Single User Wrapper Start -->
              <div class="single-user">
                <img src="images/testimonial/user-8.png" alt="user" />
              </div>
              <!-- Single User Wrapper End -->
            </div>

            <!-- Single User Wrapper Start -->
            <div class="arrow-btn" id="user-slider-arrow">
              <i class="fa-regular fa-arrow-right"></i>
            </div>
            <!-- Single User Wrapper End -->
          </div>
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
              <p class="duration">12 Wisata</p>
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
              <p class="duration">10 Wisata</p>
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
              <p class="duration">12 Wisata</p>
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
              <p class="duration">15 Wisata</p>
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