@extends('layout.landing_page.main')
@section('content')
<div class="page-breadcrumb-area page-bg" style="background-image: url('/images/cover-about.jpg')">
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
<div class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 blog-details-wrapper">
                <!-- Post Details Start -->
                <article class="single-post-item">
                    <div class="post-thumbnail">
                        <a href="#">

                            <img src="{{ asset('storage/'.$tour_packet->cover_image) }}" alt="Blog Image">
                        </a>
                    </div>
                    <div class="post-content-wrapper">
                        <div class="post-meta style-2">
                            <div class="post-meta-inner">
                                <div class="date-info">
                                    <p class="date">
                                        {{ $tour_packet->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="post-card-divider"></div>
                        <h3 class="post-title">
                            <a href="#">

                                {{
                                $tour_packet->name
                                }}
                            </a>
                        </h3>
                        <div class="row">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary" type="button" onclick="tambah()">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                        <script>
                            function tambah() {

                                Swal.fire({
                                title: 'Apakah anda yakin?',
                                text: "Ingin menambahkan paket ini ke keranjang?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#536de6',
                                cancelButtonColor: '#fc544b',
                                confirmButtonText: 'Ya, Tambahkan!',
                                cancelButtonText: 'Batal'
                                }).then((result) => {
                                    if(localStorage.getItem('cart') == null) {
                                        const cart = [];
                                        cart.push({
                                            id: {{ $tour_packet->id }},
                                            image: '{{ $tour_packet->cover_image }}',
                                            name: '{{ $tour_packet->name }}',
                                            price: {{ $tour_packet->price }},
                                            min_person: {{ $tour_packet->min_person }},
                                            qty: {{ $tour_packet->min_person }},
                                            total: {{ $tour_packet->price }}
                                        });
                                        localStorage.setItem('cart', JSON.stringify(cart));
                                    } else {
                                        const cart = JSON.parse(localStorage.getItem('cart'));
                                        const index = cart.findIndex(item => item.id == {{ $tour_packet->id }});
                                        if(index == -1) {
                                            cart.push({
                                                id: {{ $tour_packet->id }},
                                                name: '{{ $tour_packet->name }}',
                                                image: '{{ $tour_packet->cover_image }}',
                                                price: {{ $tour_packet->price }},
                                                min_person: {{ $tour_packet->min_person }},
                                                qty: {{ $tour_packet->min_person }},
                                                total: {{ $tour_packet->price }}
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Paket sudah ada di keranjang!',
                                            })
                                            return
                                        }
                                        localStorage.setItem('cart', JSON.stringify(cart));
                                    }
                                    Swal.fire(
                                        'Berhasil!',
                                        'Paket berhasil ditambahkan ke keranjang.',
                                        'success'
                                    )
                                })


                            }
                        </script>
                        <div class="post-content">
                            {!! html_entity_decode($tour_packet->description) !!}
                            @foreach($tour_packet->galleryPacket as $item)
                            <div class="post-gallery-columns-2">
                                <div class="post-gallery-item">
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Blog Image">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="post-card-divider"></div>
                    </div>
                </article>
            </div>
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
        </div>
    </div>
</div>
@endsection