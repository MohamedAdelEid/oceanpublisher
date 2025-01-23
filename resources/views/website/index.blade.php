@extends('website.layouts.temp')
@section('title', 'Home')
@section('li_home', 'active')

@section('content')

    <!-- ======= Search Box ======= -->
    <div class="footer">
        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4>Search for Products</h4>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('searching') }}" method="">
                            <input type="text" name="keyword" required placeholder="Search for Products..">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Search Box -->

    <!-- ======= Categories Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>areas</h2>
                <p>Subject Categories</p>
            </header>
            <div class="row">
                @foreach ($data['categories'] as $category)
                    <div class="col-lg-4 mb-4">
                        <a href="{{ route('showCategory', $category->slug) }}">
                            <div class="post-box">
                                <div class="post-img">
                                    <img src="{{ $category->image }}" class="img-fluid" alt="{{ $category->name }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h3 class="post-title">{{ $category->name }}</h3>
                                    <span class="post-date"><i class="bi bi-book"></i> {{ $category->products->count() }} Books</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ======= End Categories ======= -->

    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Testimonials</h2>
                <p>What they are saying about us</p>
            </header>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach ($data['testimonials'] as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    @for ($i = 1; $i <= $testimonial->stars; $i++)
                                    <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                                <p>{{ $testimonial->body }}</p>
                                <div class="profile mt-auto">
                                    <h3>{{ $testimonial->name }}</h3>
                                    <h4>{{ $testimonial->job }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section> --}}
    <!-- ======= End Testimonials ======= -->

    <!-- ======= Contact-Us Section ======= -->
    <section id="contact" class="contact" style="background: #f0fbff">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Contact Us</p>
            </header>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form action="{{ route('contactMessage', 'home') }}" method="post" class="php-email-form" id="contact-form"  style="background: #f0fbff">
                        @csrf
                        <input type="hidden" name="type" value="message">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your Name" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="Subject" >
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" value="{{ old('message') }}" placeholder="Message" ></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 text-center">
                                @if (session('success'))
                                <div class="text-success mb-4">{{ session('success') }}</div>
                                @endif
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Contact-Us ======= -->

@endsection
