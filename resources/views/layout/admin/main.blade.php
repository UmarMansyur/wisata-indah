<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-boxed-layout="full"
  data-layout="vertical" data-card="shadow">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
@include('layout.admin.head')
<body>
  @include('sweetalert::alert')
  <div class="preloader" id="layer">
    <img src="/images/spinner.svg" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    @include('layout.admin.sidebar')
    <div class="page-wrapper">
      @include('layout.admin.horizontal')
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12 mb-4 mt-0">
              <h4 class="fw-semibold mb-8" style="text-transform: capitalize">{{ Route::currentRouteName() ==
                'dashboard' ? 'Administrator' : Route::currentRouteName() }}</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/admin/dashboard">{{ Route::currentRouteName() ==
                      'dashboard' ? 'Administrator' : 'Dashboard' }}</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page" style="text-transform: capitalize"> {{
                    Route::currentRouteName() == 'dashboard' ? 'Administrator' : Route::currentRouteName() }}</li>
                </ol>
              </nav>
            </div>
          </div>
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/js/app.init.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/simplebar/dist/simplebar.min.js"></script>
  <script src="/assets/js/sidebarmenu.js"></script>
  <script src="/assets/js/theme.js"></script>
  @if(Request::is('admin/dashboard'))
  <script src="/assets/vendor/apexcharts/dist/apexcharts.min.js"></script>
  <script src="/assets/js/dashboards/dashboard2.js"></script>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  @if(Request::is('admin/pariwisata/tambah') || Request::is('admin/pariwisata/*'))
  <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
  <script src="/assets/js/ckeditor.init.js"></script>
  <script>
    $(document).ready(function () {
      $('.select2').select2();
    });
  </script>
  @endif
</body>

</html>