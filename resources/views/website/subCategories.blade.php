@extends('website.layouts.temp')
@section('title', $data['category']->name)
@section('li_categories', 'active')


@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Categories</li>
            </ol>
            <h2>{{ $data['category']->name }}</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= Sub Categories Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>{{ $data['category']->name }}</p>
            </header>
            <div class="row gy-4">

                @foreach ($data['subCategories'] as $sub)
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up">
                        <a href="{{ route('showSubCategory', $sub->slug) }}">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ $sub->image }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $sub->name }}</h4>
                                    <span><i class="bi bi-book"></i> {{ $sub->books }} Books</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ====== Sub Categories ======= -->
@endsection
