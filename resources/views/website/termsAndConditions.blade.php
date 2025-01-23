@extends('website.layouts.temp')
@section('title', 'Terms and Conditions')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Terms and Conditions</li>
            </ol>
            <h2>Terms and Conditions</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    
    <!-- ======= Terms and Conditions Section ======= -->
    <section class="faq">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Our Terms and Conditions</p>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    {!! $data['lookup']->terms_conditions !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Terms and Conditions Section -->

@endsection
