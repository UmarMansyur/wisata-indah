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
            <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
              <div class="d-flex align-items-center w-100 h-100">
                <div class="card-body">
                  <div class="mb-5">
                    <h2 class="fw-bolder fs-7 mb-3">Forgot your password?</h2>
                    <p class="mb-0 ">
                      Masukkan email yang terdaftar untuk mengatur ulang kata sandi Anda. Anda akan menerima email
                      dengan tautan untuk mengatur ulang kata sandi Anda.
                    </p>
                  </div>
                  <form action="{{ route('forgot') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email:</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        placeholder="Masukkan Email Anda" name="email" value="{{ old('email') }}">
                    </div>
                    <button type="submit" class="btn bg-primary text-primary w-100 py-8 text-white mb-3"
                      onclick="loader()">Reset Password</button>
                    <a href="{{ route('login') }}" class="btn bg-primary-subtle text-primary w-100 py-8">Back to
                      Login</a>
                  </form>
                </div>
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
      var layer = document.getElementById("layer");
      layer.style.display = "none";
    }
  </script>
</body>

</html>