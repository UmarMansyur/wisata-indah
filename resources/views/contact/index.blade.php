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
                        <h2 class="title">Contact number</h2>
                        <div class="info">
                            <a href="tel:+65-48596-5789" class="desc">(+65) - 48596 - 5789</a>
                            <a href="tel:+65-48596-5790" class="desc">(+65) - 48596 - 5790</a>
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
                            <a href="mailto:info@travon.com" class="desc">info@travon.com</a>
                            <a href="mailto:info.example@gmail.com" class="desc">info.example@gmail.com</a>
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
                        <h2 class="title">Office address</h2>
                        <div class="info">
                            <span class="address-desc">Burnsville, MN 55337 Street,<br>United States</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact-info Section End -->

<!-- Contact Form Section Start -->
<div class="contact-form-area">
    <!-- Submit form Start -->
    <div class="container">
        <div class=" row gy-5">
            <div class="col-lg-5 justify-content-center">
                <div class="video-modal-card style-1">
                    <div class="image-wrapper">
                        <img src="images/Contact-page/image-1.jpg" alt="Video Modal">
                    </div>
                    <div class="popup-video-wrapper">
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="mfp-iframe video-play">
                                <i class="icon-play-button" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <!-- Comment Form Start -->
                <div class="comment-respond">
                    <form action="#" method="post" class="comment-form">
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="contacts-name">
                                    <label for="author">Full name</label>
                                    <input name="author" id="author" type="text" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-email">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="text" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-phone">
                                    <label for="phone">Phone Number</label>
                                    <input name="phone" id="phone" type="text" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contacts-subject">
                                    <label for="subject">Subject</label>
                                    <input name="subject" id="subject" type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contacts-message">
                                    <label for="comment">Your Comment</label>
                                    <textarea name="comment" id="comment" cols="20" rows="3" placeholder="Enter Your Comments"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="theme-btn" type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>
        </div>
    </div>
    <!-- Submit form End -->
</div>
@stop