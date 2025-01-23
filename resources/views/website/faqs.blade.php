@extends('website.layouts.temp')
@section('title', 'FAQs')
@section('li_faqs', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>FAQs</li>
            </ol>
            <h2>FAQs List</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Frequently Asked Questions</p>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="faqlist">

                        @foreach ($data['faqs'] as $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#target_{{ $item->id }}">
                                    {{ $item->title }}
                                </button>
                            </h2>
                            <div id="target_{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">{!! $item->body !!}</div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End F.A.Q Section -->

@endsection
