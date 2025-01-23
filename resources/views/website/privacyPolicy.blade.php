@extends('website.layouts.temp')
@section('title', 'Privacy Policy')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Privacy Policy</li>
            </ol>
            <h2>Privacy Policy</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= Privacy Policy Section ======= -->
    <section class="faq">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Our Privacy Policy</p>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    {!! $data['lookup']->privacy_policy !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy Policy Section -->

@endsection
