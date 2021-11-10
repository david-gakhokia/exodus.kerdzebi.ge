<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Kerdzebi.ge - Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('backend/assets/img/favicon.ico') }}'/>
  <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-arial-caps/css/bpg-arial-caps.min.css" />
  <style>
    h1,h2,h3,h4,h5,h6 ,p,a ,button,label{
     font-family: "BPG Arial Caps", sans-serif !important;
    }
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="text-center">
                <img  src="{{ asset('backend/assets/img/logo/logo.png') }}" width="70%" alt="logo">
              </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>ავტორიზაცია</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">ელ.ფოსტა</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autocomplete="email" autofocus>
                    <div class="invalid-feedback">
                        შეიყვანეთ ელ.ფოსტა
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">პაროლი</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          დაგავიწყდა პაროლი?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">

                    <div class="invalid-feedback">
                      შეიყვანეთ პაროლი!
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input"  id="remember" tabindex="3"  {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember-me">დამახსოვრება</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      შესვლა
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('დაგავიწყდა პაროლი?') }}
                        </a>
                    @endif
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Copyright &copy; {{ date('Y') }} <a href="https://diem.ge" target="_blank">DMG</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>

</html>
