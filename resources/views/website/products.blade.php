@extends('website.layouts.temp')
@section('title', $data['category']->name)
@section('li_categories', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Searching</li>
            </ol>
            <h2>{{ $data['category']->name }}</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= Pricing Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>{{ $data['category']->name }}</p>
            </header>
            <div class="row gy-4" data-aos="fade-left">

                @foreach ($data['products'] as $product)
                    {{-- <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in">
                        <a href="{{ route('showProduct', $product->slug) }}">
                            <div class="box p-0">
                                <img src="{{ $product->image }}" class="img-fluid  p-0" alt="">
                                <h2 class="my-4 text-bold" style="color: #662992;">{{ $product->title }}</h2>
                                <p>LeveL: {{ $product->author }}</p>
                            </div>
                        </a>
                    </div> --}}
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up">
                        <a href="{{ route('showProduct', $product->slug) }}">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ $product->image }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $product->title }}</h4>
                                    <span><i class="bi bi-sort-up-alt"></i> Level: {{ $product->author }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>
    </section><!-- End Pricing Section -->
@endsection
