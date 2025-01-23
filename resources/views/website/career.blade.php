@extends('website.layouts.temp')
@section('title', 'Career Form')
@section('li_career', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Career Form</li>
            </ol>
            <h2>Apply Job</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->
        
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Career Form</p>
            </header>
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('contactMessage', 'career') }}" method="post" class="php-email-form" id="contact-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="career">
                        <div class="row gy-4">
                            <div class="col-md-12">
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
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Your Phone" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('job_post') is-invalid @enderror" name="job_post" value="{{ old('job_post') }}" placeholder="Enter Job Post" >
                                @error('job_post')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('educational_degree') is-invalid @enderror" name="educational_degree" value="{{ old('educational_degree') }}" placeholder="Enter Educational Degree" >
                                @error('educational_degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="cv_file">Your CV <small>(Support PDF only)</small></label>
                                <input type="file" class="form-control @error('cv_file') is-invalid @enderror" name="cv_file" accept=".pdf">
                                @error('cv_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 text-center mt-4">
                                @if (session('success'))
                                <div class="text-success mb-4">{{ session('success') }}</div>
                                @endif
                                <button type="submit">Apply Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

@endsection
