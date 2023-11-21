<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Leaderhub</title>
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
                            <div class="brand-logo">
                                <img src="{{ get_logo() }}" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="fw-light">Sign in to continue.</h6>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" value="{{ old('email') }}" name="email"
                                        required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" id="password" placeholder="Password" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="show_password"
                                                id="show_password">
                                            Show Password
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="{{ url('/') }}/admin-assets/index.html">SIGN IN</button>
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
                                        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot
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

    <script>
        const passwordField = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('show_password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
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
