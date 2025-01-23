@extends('website.layouts.temp')
@section('title', 'About Us')
@section('li_about', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>About Us</li>
            </ol>
            <h2>Who We Are</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Who We Are</h3>
                        <h2>{{ env('APP_NAME') }}</h2>
                        <div>{!! $data['lookup']->about_us !!}</div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ $data['lookup']->about_image }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->


    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <i class="bi bi-award display-1" style="color: #fed038"></i>
                        <h3 class="mt-3">Our Mission</h3>
                        <div class="text-start">{!! $data['lookup']->mission !!}</div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <i class="bi bi-lightbulb display-1" style="color:#662992"></i>
                        <h3 class="mt-3">Our Vision</h3>
                        <div class="text-start">{!! $data['lookup']->vision !!}</div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                    <div class="box">
                        <i class="bi bi-rocket display-1" style="color: #8dd8f6"></i>
                        <h3 class="mt-3">Our Goals</h3>
                        <div class="text-start">{!! $data['lookup']->goals !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Values Section -->

@endsection
