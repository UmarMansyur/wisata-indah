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
                        <h3 class="page-title">Paket Wisata</h3>
                    </div>
                    <div class="breadcrumb-list">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="active"><a href="#">Paket Wisata</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End !-->

<div class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 blog-post">
                @foreach($packet_destination as $item)
                <article class="single-post-item format-image">
                    <div class="post-thumbnail">
                        <a href="{{ route('Detail Paket Wisata', Crypt::encrypt($item->id)) }}">
                            <img src="{{ asset('storage/'.$item->cover_image) }}" alt="Blog Image">
                        </a>
                    </div>
                    <div class="post-content-wrapper">
                        <div class="post-meta style-2">
                            <div class="post-meta-inner">
                                <div class="date-info">
                                    <p class="date">
                                        {{ $item->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="badge">
                                <a class="badge-btn" href="{{ route('Detail Paket Wisata', Crypt::encrypt($item->id)) }}">

                                    {{
                                        $item->is_madura == 0 ? 'Madura' : 'Luar Madura'
                                    }}
                                </a>
                            </div>
                        </div>
                        <div class="post-card-divider"></div>
                        <h3 class="post-title">
                            <a href="{{ route('Detail Paket Wisata', Crypt::encrypt($item->id)) }}">
                                {{ $item->name }}
                            </a>
                        </h3>
                        <div class="post-content">
                            {!! html_entity_decode($item->description) !!}
                        </div>
                        <div class="read-more">
                            <a href="{{ route('Detail Paket Wisata', Crypt::encrypt($item->id)) }}" class="theme-btn">Selengkapnya<i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </article>
                @endforeach
                {{ $packet_destination->links('vendor.pagination.destinasi') }}
            </div>
            <!-- Blog Post List End -->
            <!-- Blog Sidebar Start -->
            <div class="col-lg-5 order-1 order-lg-2">
                <div class="sidebar">
                    <div class="widget widget_search">
                        <!-- <div class="widget-title-box">
                            <h4 class="wp-block-heading">Search</h4>
                        </div> -->
                        <form class="search-form" action="#" method="get">
                            <input type="text" placeholder="Search..">
                        </form>
                        <button type="submit"><i class="icon-search"></i></button>
                    </div>
                    <div class="widget widget_latest_post">
                        <div class="widget-title-box">
                            <h4 class="wp-block-heading">Recent Posts</h4>
                        </div>
                        <ul>
                            @foreach($packet_destination as $item)
                            <li>
                                <div class="latest-post-thumb">
                                    <img src="{{ asset('storage/'.$item->cover_image) }}" alt="Latest Post">
                                </div>
                                <div class="latest-post-desc">
                                    <h3 class="latest-post-title">
                                        <a href="{{ route('Detail Paket Wisata', Crypt::encrypt($item->id)) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                    <span class="latest-post-meta">
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_categories">
                        <div class="widget-title-box">
                            <h4 class="wp-block-heading">Categories</h4>
                        </div>
                        <ul>
                            @foreach($type_tour as $item)
                            <li><a href="/paket-wisata?jenis={{$item->name}}">{{$item->name}}</a>({{$item->total}})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_instagram_feed">
                        <div class="widget-title-box">
                            <h4 class="wp-block-heading">Gallery</h4>
                        </div>
                        <div class="widget-instagram-feed">
                            @foreach($galleries as $item)
                            <div class="single-instagram-feed">
                                <img src="{{ asset('storage/'.$item->image) }}" alt="Instagram Image">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Sidebar Start -->
        </div>
    </div>
</div>
@endsection