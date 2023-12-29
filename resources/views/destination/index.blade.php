@extends('layout.landing_page.main')
@section('content')

<div class="body-overlay"></div>
<div class="page-breadcrumb-area page-bg" style="background-image: url('images/cover-about.jpg')">
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

<div class="tour-area">
    <div class="location-area style-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title  align-content-center justify-content-center text-center">
                        <div class="sec-content">
                            <h2 class="title">Cari Destinasi Wisata</h2>
                            <img class="bottom-shape" src="images/shape/bottom-bar.png" alt="Bottom Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="portfolio-filter">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".resort">Resort</li>
                        <li data-filter=".mountain">Mountain Hiking</li>
                        <li data-filter=".beach">Beach</li>
                        <li data-filter=".forest">Forest</li>
                    </ul>
                </div>
            </div>
            <div class="isotope-grid">
                <div class="row gy-4">
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item resort beach wow fadeInUp" data-wow-delay="0s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-5.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">62.024</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">Asian discovery</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item mountain forest wow fadeInUp"
                        data-wow-delay=".4s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-6.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">64.048</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">Mountain hiking tour</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item beach forest wow fadeInUp"
                        data-wow-delay=".8s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-7.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">66.062</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">Adventure maldivs</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item resort beach wow fadeInUp"
                        data-wow-delay="1.2s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-8.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">74.066</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">The minimalist sea</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item mountain forest wow fadeInUp"
                        data-wow-delay="1.6s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-9.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">72.028</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">Antique europe</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                    <!--- Single Location Start !-->
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item resort beach wow fadeInUp" data-wow-delay="2s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="tour-details.html" class="image-inner">
                                    <img src="images/location-card/image-10.jpg" alt="Location Image">
                                </a>
                                <div class="favourite-icon">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                            </div>
                            <div class="content-wrapper">
                                <div class="content-inner">
                                    <h5 class="price">Rp.<span class="counter">68.044</span></h5>
                                    <h3 class="content-title"><a href="tour-details.html">Awesome island</a></h3>
                                    <div class="time-zone">
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <p class="title">Agoda, surulere lagos</p>
                                        </div>
                                        <div class="time-zone-inner">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="title">4 Days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- Single Location End !-->
                </div>
            </div>
            <div class="basic-pagination">
                <ul class="justify-content-center">
                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                    <li><a class="page-numbers" href="#">2</a></li>
                    <li><a class="page-numbers" href="#">3</a></li>
                    <li><span class="page-numbers dots">…</span></li>
                    <li><a class="page-numbers" href="#">5</a></li>
                    <li><a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop