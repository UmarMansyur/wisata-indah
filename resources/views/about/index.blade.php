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
              <li><a href="index-2.html">Home</a></li>
              <li class="active"><a href="#">About us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End !-->

<!-- About Us Area Start -->
@include('layout.landing_page.about')
<!-- About Us Area Start -->

<!-- Process Step Area Start  -->
@include('layout.landing_page.step')
<!-- Process Step Area End  -->

<!-- Video Modal Area  Start -->
<div class="video-modal-area style-1">
  <div class="container">
    <div class="section-title">
      <div class="sec-content wow fadeInLeft" data-wow-delay="0s">
        <span class="short-title">Destinasi</span>
        <h2 class="title">Nikmati petualangan baru bersama kami</h2>
        <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
      </div>

    </div>
    <div class="video-modal-card style-1 wow fadeInUp" data-wow-delay=".4s">
      <div class="image-wrapper">
        <img src="images/about-bg.jpg" alt="Video Modal">
      </div>
      <div class="popup-video-wrapper">
        <div class="video-btn">
          <a href="https://www.youtube.com/watch?v=xVXEsKVgp34" class="mfp-iframe video-play">
            <i class="icon-play-button" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="btn-sec-inner wow fadeInRight" data-wow-delay=".2s">
      <div class="sec-desc">
        <p class="desc">Madura Indah Wisata, sebuah perusahaan tour & travel yang menjadi pilihan utama di Kabupaten
          Sampang, Jawa Timur. Dikenal sebagai penyedia layanan terkemuka, Madura Indah Wisata menyajikan beragam paket
          liburan, wisata, dan perjalanan yang lengkap, mencakup tiket pesawat atau kapal, akomodasi, transportasi,
          makanan, penginapan, serta didukung oleh pemandu wisata berpengalaman.
          <br><br>
          Dengan komitmen untuk memberikan pengalaman liburan yang tak terlupakan, Madura Indah Wisata tidak hanya
          menawarkan paket yang komprehensif, tetapi juga menyediakan layanan penjualan tiket pesawat dan laut,
          memastikan kebutuhan perjalanan Anda terpenuhi dengan baik.
          <br>
          <br>
          Kantor Madura Indah Wisata menjadi destinasi terbaik untuk merencanakan perjalanan Anda. Mereka siap
          memberikan informasi detail mengenai harga paket dan tiket. Dengan jam operasional yang fleksibel, Madura
          Indah Wisata buka 24 jam setiap hari mulai dari Senin hingga Minggu.
          Selain itu, Anda juga dapat mengeksplorasi opsi lain seperti PT El Ittihat Travel & Tour, Tour & Travel,
          Travel Madura, dan PT. Easy Wisata Tour & Travel di Kabupaten Sampang. Namun, dengan memilih Madura Indah
          Wisata, Anda dapat memastikan bahwa liburan Anda akan dikelola dengan profesionalisme dan kepuasan pelanggan
          menjadi prioritas utama. Hubungi Madura Indah Wisata segera untuk mewujudkan perjalanan impian Anda.
        </p>
      </div>
      <div class="sec-btn text-center mt-3">
        <a href="#" class="theme-btn">Book Now</a>
      </div>
    </div>
    <div class="counter-area">
      <div class="single-counter wow fadeInRight" data-wow-delay=".3s">
        <p class="counter-inner"><span class="counter">100</span>M+</p>
        <p class="title">Pendaftar Baru Minggu Ini</p>
      </div>
      <div class="single-counter wow fadeInRight" data-wow-delay=".4s">
        <p class="counter-inner"><span class="counter">100</span>M+</p>
        <p class="title">Pelanggan</p>
      </div>
      <div class="single-counter wow fadeInRight" data-wow-delay=".8s">
        <p class="counter-inner"><span class="counter">25</span>K+</p>
        <p class="title">Wisata Kolaborasi</p>
      </div>
      <div class="single-counter wow fadeInRight" data-wow-delay=".9s">
        <p class="counter-inner"><span class="counter">100</span>M+</p>
        <p class="title">Total Pengunjung</p>
      </div>
    </div>
  </div>
</div>
<!-- Video Modal Area  End -->

<!-- location Image Card Area Start -->
<div class="location-area style-2 bg-white">
  <div class="container">
    <div class="section-title  align-content-center justify-content-center text-center">
      <div class="sec-content">
        <h2 class="title">Our amazing team</h2>
        <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
      </div>
    </div>
    <div class="location-card-wrapper">
      <div class="row gy-4">
        <!-- Single Card Start -->
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0s">
          <div class="location-image-card style-2">
            <div class="img-wrapper">
              <img src="images/location-image-card/image-5.png" alt="Place Image">
            </div>
            <div class="content-inner">
              <h6 class="city">Jenny Wilson</h6>
              <p class="duration">CEO & Founder</p>
            </div>
          </div>
        </div>
        <!-- Single Card End -->
        <!-- Single Card Start -->
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
          <div class="location-image-card style-2">
            <div class="img-wrapper">
              <img src="images/location-image-card/image-6.png" alt="Place Image">
            </div>
            <div class="content-inner">
              <h6 class="city">Robert Mayar</h6>
              <p class="duration">Manager</p>
            </div>
          </div>
        </div>
        <!-- Single Card End -->
        <!-- Single Card Start -->
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
          <div class="location-image-card style-2">
            <div class="img-wrapper">
              <img src="images/location-image-card/image-7.png" alt="Place Image">
            </div>
            <div class="content-inner">
              <h6 class="city">Annette Black</h6>
              <p class="duration">Tour Manager</p>
            </div>
          </div>
        </div>
        <!-- Single Card End -->
        <!-- Single Card Start -->
        <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
          <div class="location-image-card style-2">
            <div class="img-wrapper">
              <img src="images/location-image-card/image-8.png" alt="Place Image">
            </div>
            <div class="content-inner">
              <h6 class="city">Bessie Cooper</h6>
              <p class="duration">Chief Agent</p>
            </div>
          </div>
        </div>
        <!-- Single Card End -->
      </div>
    </div>
  </div>
</div>
<!-- location Image Card Area End -->

<div class="testimonial-slider-area style-2 background-light-gray">
  <div class="container">
      <div class="section-title">
          <div class="sec-content">
              <span class="short-title">Testimonial</span>
              <h2 class="title">What traveler says</h2>
              <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
          </div>
      </div>
  </div>
  <div class="testimonial-marquee-wrapper style-2">
      <div class=" brand-marquee-wrapper first-marquee-wrapper">
          <!-- Single Card Start --> 
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-1.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Sabrina Meyla</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-2.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Darell Seward</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-1.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Sabrina Meyla</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-2.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Darell Seward</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-1.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Sabrina Meyla</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-2.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Darell Seward</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
      </div>
      <div class=" brand-marquee-wrapper second-marquee-wrapper">
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-4.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Annette Black</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-5.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Savan Nguyen</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-4.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Annette Black</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-5.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Savan Nguyen</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-3.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Camron Will</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-4.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Annette Black</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
          <!-- Single Card Start -->
          <div class="testimonial-card-two">
              <div class="user-meta-info">
                  <div class="user-info-inner">
                      <div class="img-wrapper">
                          <img src="images/testiomonial-slider/user-5.png" alt="User">
                      </div>
                      <div class="content">
                          <h5 class="user-name">Savan Nguyen</h5>
                          <p class="title">Indonesian tourists</p>
                      </div>
                  </div>
                  <div class="rating">
                      <div class="ratting-inner">
                          <span>
                              <i class="fa-solid fa-star"></i>
                          </span>   
                          <span class="counter">3.5</span>
                      </div>
                  </div>
              </div>
              <div class="desc-inner">
                  <p class="desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia conse quuntur ma</p>
              </div>
          </div>
          <!-- Single Card End -->
      </div>
  </div>
</div>
@stop