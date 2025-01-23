<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Grander Codes [grandercodes.com]">
    
    <!-- TITLE -->
    <title>Reset Password | {{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('panel/images/favicon.png') }}" rel="icon">

    <!-- Style -->
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
                                <img src="{{ asset('panel/images/logo.png') }}" alt="logo">
                            </div>
                            <h4 class="text-center">Reset your Password</h4>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            <form class="pt-3" method="POST" action="{{ route('password.email') }}">
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
                                <div class="mt-3 mb-3">
                                    <button
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Send Password Reset Link</button>
                                </div>
                                <div class="text-center font-weight-light">
                                    Return to login? <a href="{{ route('login') }}" class="text-primary">here</a>
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
    
</body>

</html>
