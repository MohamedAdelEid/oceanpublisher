@extends('portal.layouts.temp')
@section('li_faqs', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show FAQ Data</h4>
                        <a href="{{ route('faqs.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    <div>
                        <h4>{{ $faq->title }}</h4>
                        <div>{!! $faq->body !!}</div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection
