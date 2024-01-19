<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
  <div>
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="/admin/dashboard" class="text-nowrap logo-img">
        <img src="/images/logo.png" class="dark-logo" alt="Logo-Dark" width="50"/><b>Madura Indah Wisata</b>
        <img src="/images/logo.png" class="light-logo" alt="Logo-light" width="50"/>
      </a>
      <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'selected' : '' }}">
          <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard" aria-expanded="false">
            <span>
              <i class="ti ti-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Apps</span>
        </li>
        <li class="sidebar-item {{ request()->is('admin/pemesanan/*') ? 'selected' : '' }}">
          <a class="sidebar-link {{ request()->is('admin/pemesanan/*') ? 'active' : '' }}" href="/admin/pemesanan" aria-expanded="false">
            <span>
              <i class="ti ti-browser-check"></i>
            </span>
            <span class="hide-menu">Pemasanan</span>
          </a>
        </li>
        <li class="sidebar-item {{ request()->is('admin/paket-pariwisata/*') ? 'selected' : '' }}">
          <a class="sidebar-link {{ request()->is('admin/paket-pariwisata/*') ? 'active' : '' }}" href="/admin/paket-pariwisata" aria-expanded="false">
            <span>
              <i class="ti ti-map-2"></i>
            </span>
            <span class="hide-menu">Paket Wisata</span>
          </a>
        </li>
        <li class="sidebar-item {{ request()->is('admin/pariwisata/*') ? 'selected' : '' }}">
          <a class="sidebar-link {{ request()->is('admin/pariwisata/*') ? 'active' : '' }}" href="/admin/pariwisata" aria-expanded="false">
            <span>
              <i class="ti ti-files"></i>
            </span>
            <span class="hide-menu">Pariwisata</span>
          </a>
        </li>
        <li class="sidebar-item {{ request()->is('admin/karyawan/*') || request()->is('admin/karyawan') ? 'selected' : '' }}">
          <a class="sidebar-link {{ request()->is('admin/karyawan/*') || request()->is('admin/karyawan') ? 'active' : '' }}" href="/admin/karyawan" aria-expanded="false">
            <span>
              <i class="ti ti-users"></i>
            </span>
            <span class="hide-menu">Karyawan</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
              <i class="ti ti-settings"></i>
            </span>
            <span class="hide-menu">Pengaturan</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="{{ route('Team')}}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">About</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('Testimonial')}}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Testimonial</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded sidebar-ad mt-3">
      <div class="hstack gap-3">
        <div class="john-img">
          <img src="{{ file_exists(storage_path('app/public/' . Auth::user()->thumbnail)) ? asset('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}" class="rounded-circle" width="40" height="40" alt="" />
        </div>
        <div class="john-title">
          <h6 class="mb-0 fs-4 fw-semibold">{{ Auth::user()->username }}</h6>
          <span class="fs-2">Administrator</span>
        </div>
        <a href="{{route('logout')}}" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout"
          data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
          <i class="ti ti-power fs-6"></i>
        </a>
      </div>
    </div>
  </div>
</aside>