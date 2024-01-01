<!DOCTYPE html>
<html dir="ltr" lang="zxx">
@include('layout.landing_page.head')


<body>
  @include('sweetalert::alert')
  <div id="preloader" style="background: rgba(0, 0, 0, 0.9);">
    <div id="layer">
      <img src="/images/spinner.svg" alt="Preloader" width="100px" height="100px" />
    </div>
  </div>
  @include('layout.landing_page.header')
  @yield('content')
  @include('layout.landing_page.foot')
  <div class="search-form-wrapper">
    <div class="search-form-inner">
      <div class="search-content-filed">
        <form role="search" method="get" class="search-form" action="#">
          <input type="hidden" name="post_type" value="post" />
          <div class="search-form-input">
            <div class="search-icon">
              <i class="icon-search"></i>
            </div>
            <input type="search" placeholder="Search" />
            <button class="theme-btn" type="submit" title="Search" aria-label="Search">Search</button>
          </div>
        </form>
        <span class="search-close">
          <i class="fa-light fa-xmark"></i>
        </span>
      </div>
    </div>
  </div>
  <div id="scrollTop" class="scrollup-wrapper">
    <div class="scrollup-btn">
      <i class="fa-solid fa-arrow-up"></i>
    </div>
  </div>

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.nice-select.min.js"></script>
  <script src="/js/slick.min.js"></script>
  <script src="/js/jquery.counterup.min.js"></script>
  <script src="/js/waypoints.js"></script>
  <script src="/js/jquery.meanmenu.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/inview.min.js"></script>
  <script src="/js/wow.js"></script>
  <script src="/js/tilt.jquery.js"></script>
  <script src="/js/isotope.min.js"></script>
  <script src="/js/jquery.imagesloaded.min.js"></script>
  <script src="/js/select2.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/custom.js"></script>
  <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

</body>

</html>