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
            <div class="col-lg-12 blog-details-wrapper">
                <!-- Post Details Start -->
                <article class="single-post-item">
                    <div class="post-title-wrapper">
                        <h3 class="post-title">
                            <a href="/destination/detail/{{ Crypt::encrypt($tour->id) }}">
                                {{ $tour->title }} </a>
                        </h3>
                    </div>
                    <div class="post-meta style-2">
                        <div class="post-meta-inner">
                            <div class="date-info">
                                <i class="fa-solid fa-location-dot"></i>
                                <p class="date"> {{ $tour->address }} </p>
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
                            <h4 class="mb-5">Galeri</h4>
                            <div class="post-gallery">
                                @foreach ($tour->gallery as $item)
                                <div class="post-gallery-item">
                                    <img src="{{ url('storage/'.$item->url) }}" alt="image"
                                        style="width: 100%; height: 100%">
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
        </div>
    </div>
</div>
<script>
    // onload isi form dari local storage
    window.onload = function () {
    $('input[name="username"]').val(localStorage.getItem('username'));
    $('input[name="email"]').val(localStorage.getItem('email'));
    $('input[name="gender"]').val(localStorage.getItem('gender'));
    $('input[name="phone"]').val(localStorage.getItem('phone'));
    $('input[name="date"]').val(localStorage.getItem('date'));
    $('input[name="child"]').val(localStorage.getItem('child'));
    $('input[name="adult"]').val(localStorage.getItem('adult'));
};

    function confirm() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan mengirimkan permintaan kunjungan ke {{ $tour->title }}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#preloader').show();
                localStorage.setItem('username', $('input[name="username"]').val());
                localStorage.setItem('email', $('input[name="email"]').val());
                localStorage.setItem('gender', $('input[name="gender"]').val());
                localStorage.setItem('phone', $('input[name="phone"]').val());
                localStorage.setItem('date', $('input[name="date"]').val());
                localStorage.setItem('child', $('input[name="child"]').val());
                localStorage.setItem('adult', $('input[name="adult"]').val());
                setTimeout(function() {
                    $('.comment-form').submit();
                }, 2000);
            }
        })
    }
</script>
@endsection