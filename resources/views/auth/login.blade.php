<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Grander Codes [grandercodes.com]">
    <meta content="{{ $data['lookup']->title }}" name="description">
    <meta content="{{ $data['lookup']->meta_tags }}" name="keywords">

    <!-- TITLE -->
    <title>Login | {{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Tools -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <!-- Favicons -->
    <link href="{{ $data['lookup']->favicon }}" rel="icon">
    <link href="{{ $data['lookup']->favicon }}" rel="apple-touch-icon">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('panel/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('panel/css/vertical-layout-light/style.css') }}">
</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{{ $data['lookup']->logo }}" alt="logo">
                            </div>
                            <h4 class="text-center">Sign in to continue.</h4>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                        </label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot
                                        password?</a>
                                </div>
                                <div class="mt-3 mb-3">
                                    <button
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}"
                                        class="text-primary">Register</a>
                                </div>
                                <div class="text-center font-weight-light">
                                    Return to website? <a href="{{ route('/') }}" class="text-primary">here</a>
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
    
    <!-- scripts -->
    <script src="{{ asset('panel/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('panel/js/template.js') }}"></script>

</body>

</html>
