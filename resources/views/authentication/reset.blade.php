<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-boxed-layout="full"
  data-layout="vertical" data-card="shadow">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator | Madura Indah Wisata - Travel & Tour Booking in Madura</title>
  <link rel="icon" type="image/png" href="/images/logo.png">
  <link rel="stylesheet" href="/assets/css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    #layer {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      overflow: hidden;
    }
  </style>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  @include('sweetalert::alert')
  <div class="preloader" id="layer">
    <img src="/images/spinner.svg" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="../index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="/images/logo.png" class="dark-logo" alt="Logo-Dark" width="40" />
              <img src="/images/logo.png" class="light-logo" alt="Logo-light" />
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="/assets/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang di Madura Indah Wisata</h2>
                <p class=" mb-9">Halaman Reset Password</p>
                <div class="position-relative text-center my-4">
                  <p class="mb-0 fs-4 px-3 d-inline-block text-bg-white text-dark z-index-5 position-relative">
                    Tekan Reset Untuk Melanjutkan
                  </p>
                  <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <form action="{{ route('reset-password') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <input type="hidden" name="user_id" value="{{ $token }}">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" aria-describedby="password"
                      name="password" placeholder="Masukkan Password anda" name="password" value="{{ old('password') }}"
                      required autocomplete="current-password">
                  </div>
                  <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation"
                      placeholder="Masukkan Password anda" name="password_confirmation" required
                      autocomplete="new-password" value="{{ old('password_confirmation') }}">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2" onclick="loader()">
                    <i class="bx bxs-lock-open"></i> Reset Password
                  </button>
                  <p class="mb-0 text-center">
                    <a href="{{ route('login') }}" class="text-primary">Kembali ke halaman login</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/js/app.min.js"></script>
  <script src="/assets/js/app.init.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/simplebar/dist/simplebar.min.js"></script>
  <script src="/assets/js/sidebarmenu.js"></script>
  <script src="/assets/js/theme.js"></script>
  <script>
    function loader() {
      document.getElementById("layer").style.display = "none";
    }
  </script>
</body>

</html>