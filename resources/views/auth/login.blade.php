<!doctype html>
<html lang="en">

<head>
  <title>Approval APP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="PT. Pusri Palembang">

  <!-- VENDOR CSS -->
  <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

  <!-- MAIN CSS -->
  <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body {
      background: #f5f5f5;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .login-container {
      min-height: 100vh;
      background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
    }

    .login-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      transition: all 0.3s ease;
      width: 100%;
      max-width: 400px;
      z-index: 10;
    }

    .form-control {
      height: 50px;
      border-radius: 10px;
      border: 1px solid #e1e1e1;
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, .25);
    }

    .btn-login {
      height: 50px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    @media (max-width: 768px) {
      body {
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
      }

      .login-container {
        background: transparent;
      }

      .col-md-5 {
        width: 100%;
      }

      .login-card {
        margin: 1rem;
        background: #ffffff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Login Section -->
      <div class="col-md-12 login-container d-flex align-items-center justify-content-center p-3">
        <div class="login-card">
          <h4 class="text-center mb-4 fw-bold">Selamat Datang </h4>
          <form id="FormData">
            @csrf
            <div class="mb-4">
              <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan Nik">
            </div>
            <div class="mb-4">
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            </div>
            <button type="submit" class="btn btn-primary btn-login w-100">
              <i class="fa fa-sign-in me-2"></i> MASUK
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ URL::asset('assets/bundles/libscripts.bundle.js') }}"></script>
  <script src="{{ URL::asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bundles/mainscripts.bundle.js') }}"></script>
  <script>
    var APP_URL = "{{ env('APP_URL') }}";
  </script>
  <script src="{{ URL::asset('assets/js/subjs/auth/login.js') }}"></script>
</body>

</html>