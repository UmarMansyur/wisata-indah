@extends('layout.landing_page.main')
@section('content')

<div class="body-overlay"></div>
<div class="page-breadcrumb-area page-bg" style="background-image: url('/images/cover-about.jpg')">
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

<div class="tour-area">
    <div class="location-area style-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title  align-content-center justify-content-center text-center">
                        <div class="sec-content">
                            <h2 class="title">Cari Destinasi Wisata</h2>
                            <img class="bottom-shape" src="/images/shape/bottom-bar.png" alt="Bottom Shape">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="portfolio-filter">
                        <li class="active" data-filter="*">Semua</li>
                        @foreach ($type_tour as $item)
                        <li data-filter=".{{ $item->name }}">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="isotope-grid">
                <div class="row gy-4">
                    @foreach ($tours as $item)
                    <div class="col-lg-4 col-md-6 masonry-portfolio-item {{ $item->detailTour->pluck('typeTour.name')->implode(' ') }} beach wow fadeInUp" data-wow-delay="0s">
                        <div class="location-card style-2">
                            <div class="image-wrapper">
                                <a href="{{ route('detail destination', encrypt($item->id)) }}" class="image-inner">
                                    <img src="{{ url('storage/'.$item->cover_image) }}" alt="Location Image">
                                </a>
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
                                            <i class="fa-solid fa-envelope"></i>
                                            <p class="title">{{ $item->detailTour->pluck('typeTour.name')->implode(',') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="basic-pagination">
                {{ $tours->links('vendor.pagination.destinasi') }}
            </div>
        </div>
    </div>
</div>
@stop