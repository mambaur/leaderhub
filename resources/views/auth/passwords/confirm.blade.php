<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('Konfirmasi Password') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('/') }}/admin-assets/images/leaderhub/mini-logo.png" />
</head>


<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="brand-logo">
                                <img src="{{ get_logo() }}" alt="logo">
                            </div>
                            <h4>{{ __('Konfirmasi Password') }}</h4>
                            <h6 class="fw-light">{{ __('Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}</h6>
                            <form class="pt-3" method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password" required
                                        autocomplete="current-password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('Konfirmasi Password') }}</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            {{-- <input type="checkbox" class="form-check-input" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Keep me signed in --}}
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="auth-link text-black">Lupa
                                            password?</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ url('/') }}/admin-assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('/') }}/admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('/') }}/admin-assets/js/off-canvas.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/hoverable-collapse.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/template.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/settings.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
