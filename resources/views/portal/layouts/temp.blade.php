@include('portal.layouts.head')

<div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('portal.layouts.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('portal.layouts.sidebar')

        <!-- partial -->
        <div class="main-panel">

            <div class="content-wrapper">
                
                <!-- partial:partials/flash.html -->
                @include('portal.layouts.flash')
                
                @yield('content')
            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. <a href="https://grandercodes.com/" target="_blank">ME</a> All rights
                        reserved.
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">{{ env('APP_NAME') }} <i
                            class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>

        </div>
        <!-- main-panel ends -->

        <!-- partial:partials/modals.html -->
        @include('portal.layouts.modals')

    </div>
    <!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->


@include('portal.layouts.footer')
