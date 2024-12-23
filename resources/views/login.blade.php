<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pengguna</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- Custom Style -->
  <style>
    body {
      background: linear-gradient(135deg, #1a73e8 0%, #34a853 50%, #b3d4fc 100%);
      font-family: 'Source Sans Pro', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      width: 400px;
      padding: 20px;
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .login-logo img {
      width: 175px;
      height: auto;
      display: block;
      margin: 0 auto 10px;
    }

    .login-logo h1 {
      font-size: 1.5rem;
      font-weight: bold;
      color: #1a73e8;
      text-align: center;
      margin-bottom: 10px;
    }

    .card-header {
      background: transparent;
      border: none;
      text-align: center;
      padding-bottom: 0;
    }

    .card-body {
      padding-top: 0;
    }

    .btn-primary {
      background-color: #34a853;
      border-color: #34a853;
      border-radius: 25px;
      font-size: 1rem;
      padding: 10px 20px;
    }

    .btn-primary:hover {
      background-color: #2b8c44;
      border-color: #2b8c44;
    }

    .btn-secondary {
      background-color: #f4b400;
      border-color: #f4b400;
      color: #ffffff;
      border-radius: 25px;
      font-size: 1rem;
      padding: 10px 20px;
    }

    .btn-secondary:hover {
      background-color: #d99e00;
      border-color: #d99e00;
    }

    .form-control {
      border-radius: 25px;
    }

    .input-group-text {
      background-color: #f4f6f9;
      border-radius: 25px 0 0 25px;
    }

    .login-box-msg {
      font-size: 1.2rem;
      color: #666;
      text-align: center;
      margin-bottom: 20px;
    }

    .alert {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('dist/img/bumn_3_-removebg-preview.png') }}" alt="Logo Rumah BUMN">
    <h1>Manajemen<b> UMKM</b></h1>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Silakan login untuk melanjutkan</p>
      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Login Gagal!</strong> {{ session('loginError') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="reset" class="btn btn-secondary btn-block">Cancel</button>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
