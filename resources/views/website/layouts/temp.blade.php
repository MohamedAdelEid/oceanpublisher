
@include('website.layouts.head')

    <!-- ======= Header Section ======= -->
    @include('website.layouts.header')
    <!-- ======= End Header ======= -->

    @if (Route::currentRouteName() == '/')
    <!-- ======= Sliders Section ======= -->
    @include('website.layouts.sliders')
    <!-- ======= End Sliders ======= -->
    @endif
    
    <!-- ======= Main Section ====== -->
    <main id="main">
        @yield('content')
    </main>
    <!-- ======= End Main ======= -->

@include('website.layouts.script')