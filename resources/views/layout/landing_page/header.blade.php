<header class="header-area {{ request()->is('/') == 1 ? 'style-1' : '' }}">
  <div class="header-menu-area sticky-header">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-6 col-6 d-flex align-items-center">
          <div class="logo">
            <a href="/" class="standard-logo"><img src="/images/logo.png" alt="logo" style="width: 70px" /></a>
            <a href="/" class="sticky-logo"><img src="/images/logo.png" alt="logo" style="width: 70px" /></a>
            <a href="/" class="retina-logo"><img src="/images/logo.png" alt="logo" style="width: 70px" /></a>
          </div>
        </div>
        <div class="col-xl-10 col-lg-10 col-md-6 col-6 d-flex align-items-center justify-content-end">
          <div class="menu d-inline-block">
            <nav id="main-menu" class="main-menu">
              <ul>
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                <li class="dropdown {{ request()->is('destination') ? 'active' : '' }}">
                  <a href="{{ route('destination') }}">Destinasi</a>
                  <ul class="submenu">
                    <li><a href="/destination?location=Sumenep">Sumenep</a></li>
                    <li><a href="/destination?location=Pamekasan">Pamekasan</a></li>
                    <li><a href="/destination?location=Sampang">Sampang</a></li>
                    <li><a href="/destination?location=Bangkalan">Bangkalan</a></li>
                  </ul>
                </li>
                <li class="dropdown {{ request()->is('Paket Wisata') ? 'active' : '' }}">
                  <a href="{{ route('Paket Wisata') }}">Paket Pariwisata</a>
                  <ul class="submenu">
                    <li><a href="/paket-wisata?is_madura=true">Wisata Madura</a></li>
                    <li><a href="/paket-wisata?is_madura=false">Wisata Luar Madura</a></li>
                  </ul>
                </li>
                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a>
                </li>
                <li class="{{ request()->is('/keranjang') ? 'active' : '' }}"><a href="{{ route('Keranjang') }}">Keranjang</a></li>
              </ul>
            </nav>
          </div>
          <!-- Header Button Start !-->
          <div class="header-btn">
            <div class="search-btn-wrapper">
              <a href="#" class="search-btn">
                <i class="icon-search"></i>
              </a>
            </div>
            <a href="#" class="user-login-btn">
              <i class="icon-user"></i>
            </a>
          </div>
          <!-- Header Button Start !-->
          <!-- Mobile Menu Toggle Button Start !-->
          <div class="mobile-menu-bar d-lg-none text-end">
            <a href="#" class="mobile-menu-toggle-btn"><i class="fal fa-bars"></i></a>
          </div>
          <!-- Mobile Menu Toggle Button End !-->
        </div>
      </div>
    </div>
  </div>
  <!-- Header Nav Menu End -->
</header>

<div class="menu-sidebar-area">
  <div class="menu-sidebar-wrapper">
    <div class="menu-sidebar-close">
      <button class="menu-sidebar-close-btn" id="menu_sidebar_close_btn">
        <i class="fal fa-times"></i>
      </button>
    </div>
    <div class="menu-sidebar-content">
      <div class="menu-sidebar-logo">
        <a href="/">
          <img src="/images/logo/nav-logo.png" alt="logo" />
        </a>
      </div>
      <div class="mobile-nav-menu"></div>
      <div class="menu-sidebar-content">
        <div class="menu-sidebar-single-widget">
          <h5 class="menu-sidebar-title">Kontak Kami</h5>
          <div class="header-contact-info">
            <span><i class="fa-solid fa-location-dot"></i>Batu-Putih - Sampang, Jawa Timur</span>
            <span><a href="mailto:hello@transico.com"><i class="fa-solid fa-envelope"></i>hello@transico.com</a> </span>
            <span><a href="tel:+123-456-7890"><i class="fa-solid fa-phone"></i>+123-456-7890</a></span>
          </div>
          <div class="social-profile">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="body-overlay"></div>