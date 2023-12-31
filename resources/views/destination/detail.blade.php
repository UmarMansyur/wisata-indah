@extends('layout.landing_page.main')
@section('content')
<div class="page-breadcrumb-area page-bg" style="background-image: url('/images/cover-about.jpg')">
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
                            <li class="active"><a href="#">Destinasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="blog-area tour-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 blog-details-wrapper">
                <!-- Post Details Start -->
                <article class="single-post-item">
                    <div class="post-title-wrapper">
                        <h3 class="post-title">
                            <a href="blog-details.html"> {{ $tour->title }} </a>
                        </h3>
                        {{-- <div class="rating">
                            <div class="ratting-inner">
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <span class="counter">3.5</span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="post-meta style-2">
                        <div class="post-meta-inner">
                            <div class="date-info">
                                <i class="fa-solid fa-location-dot"></i>
                                <p class="date"> {{ $tour->address }} </p>
                            </div>
                            <div class="time-info">
                                <i class="fa-solid fa-clock"></i>
                                <p class="time"> {{ $tour->duration }} {{ $tour->unit_duration }} </p>
                            </div>
                        </div>
                        <div class="post-meta-inner">
                            <div class="date-info">
                                <i class="fa-solid fa-calendar"></i>
                                <p class="date"> {{ Date::parse($tour->created_at)->format('j F Y') }} </p>
                            </div>
                        </div>


                    </div>
                    <div class="post-thumbnail">
                        <a href="#">
                            <img src="{{ url('storage/'.$tour->cover_image) }}" alt="image">
                        </a>
                    </div>
                    <div class="post-content-wrapper">
                        <div class="post-content">
                            <h4>Overview</h4>
                            <div> {!! html_entity_decode($tour->description) !!} </div>
                            <div class="post-card-divider"></div>
                            <div class="list-item-wrapper">
                                @foreach ($tour->costTour as $item)
                                <div class="single-item-list">
                                    <h6>Biaya Tiket {{ $item->passenger->name }}</h6>
                                    <ul>
                                        <li>
                                            <h6 class="text-primary">Rp. {{ number_format($item->price, 0, ',', '.') }}</h6>
                                        </li>
                                        
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            <div class="post-card-divider"></div>
                            <h4 class="mb-5">Galeri</h4>
                            <div class="post-gallery">
                                @foreach ($tour->gallery as $item)
                                <div class="post-gallery-item">
                                    <img src="{{ url('storage/'.$item->url) }}" alt="image" style="width: 100%; height: 100%">
                                </div>
                                @endforeach
                            </div>
                            <div class="post-card-divider mt-0"></div>
                            <h4>Tour map</h4>
                            <div class="map-wedget">
                               {!! $tour->map_location !!}
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Post Details End -->
            </div>
            <!-- Blog Sidebar Start -->
            <div class="col-lg-4 order-1 order-lg-2">
                <div class="sidebar">
                    <div class="widget widget_booking_form">
                        <h3 class="title">Pesan Sekarang</h3>
                        <form action="#" method="post" class="comment-form">
                            <div class="row g-4">
                                <div class="col-xl-12">
                                    <div class="contacts-name input-wrapper">
                                        <label>Nama Lengkap:</label>
                                        <input name="username" type="text" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contacts-email input-wrapper">
                                        <label>Email:</label>
                                        <input name="email" type="text" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input-wrapper">
                                        <label>Jenis Kelamin:</label>
                                        <select name="gender" required>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contacts-phone input-wrapper">
                                        <label>Nomer Hp:</label>
                                        <input name="phone" type="text" placeholder="Nomer Hp" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contacts-date input-wrapper">
                                        <label>Tanggal: </label>
                                        <input name="date" type="date" placeholder="Tanggal" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contacts-tour input-wrapper">
                                        <label>Jumlah Orang:</label>
                                        <input name="amount" type="text" placeholder="Dewasa">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contacts-tour input-wrapper">
                                        <label>Jumlah Orang:</label>
                                        <input name="child_amount" type="text" placeholder="Anak-Anak">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="theme-btn" type="submit">
                                        <span class="swip">
                                            <span class="title-wrapper">
                                                <span class="title-1">Book now</span>
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blog Sidebar Start -->
        </div>
    </div>
</div>
@endsection