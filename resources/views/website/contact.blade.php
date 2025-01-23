@extends('website.layouts.temp')
@section('title', 'Contact Us')
@section('li_contact', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Contact Us</li>
            </ol>
            <h2>Keep in Touch</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->
        
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Contact Us</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>{{ $data['lookup']->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>{{ $data['lookup']->phone }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>{{ $data['lookup']->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-rss"></i>
                                <h3>Follow Us</h3>
                                <div class="social-links">
                                    {{-- <a href="{{ $data['lookup']->twitter }}" target="_blank" class="twitter ">
                                        <i class="bi bi-twitter" style="font-size: 25px"></i>
                                    </a> --}}
                                    <a href="{{ $data['lookup']->facebook }}" target="_blank" class="facebook">
                                        <i class="bi bi-facebook " style="font-size: 25px"></i>
                                    </a>
                                    <a href="{{ $data['lookup']->instagram }}" target="_blank" class="instagram mx-1">
                                        <i class="bi bi-instagram" style="font-size: 25px"></i>
                                    </a>
                                    <a href="https://wa.me/{{ $data['lookup']->whatsapp }}" target="_blank" class="whatsapp">
                                        <i class="bi bi-whatsapp" style="font-size: 25px"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('contactMessage', 'contact') }}" method="post" class="php-email-form" id="contact-form">
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
    <!-- End Contact Section -->

@endsection
