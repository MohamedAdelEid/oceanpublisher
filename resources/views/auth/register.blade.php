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
    <title>Register | {{ config('app.name') }}</title>

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
                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light py-5 px-3 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{{ $data['lookup']->logo }}" alt="logo">
                            </div>
                            <h4 class="text-center">Signing up is easy. It only takes a few steps.</h4>
                            <form class="pt-4" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="first_name"
                                            class="form-control  @error('first_name') is-invalid @enderror"
                                            value="{{ old('first_name') }}" placeholder="First Name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="last_name"
                                            class="form-control  @error('last_name') is-invalid @enderror"
                                            value="{{ old('last_name') }}" placeholder="Last Name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="phone"
                                            class="form-control  @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="Phone Number">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" name="email"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="password"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="job"
                                            class="form-control  @error('job') is-invalid @enderror"
                                            value="{{ old('job') }}" placeholder="Job Title">
                                        @error('job')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="school"
                                            class="form-control  @error('school') is-invalid @enderror"
                                            value="{{ old('school') }}" placeholder="School Name">
                                        @error('school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check text-left">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="agreement" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                        @error('agreement')
                                            <span style="color: #dc3545; font-size:80%" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER
                                        NOW</button>
                                </div>
                                <div class="text-center mt-3 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary">Login</a>
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
