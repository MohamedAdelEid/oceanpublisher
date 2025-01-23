@extends('portal.layouts.temp')
@section('li_lookups', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Our Lookups data</h4>
                        <a href="{{ route('lookups.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>

                    @if (request()->type == 'info')
                        @include('portal.lookups.info')
                    @elseif(request()->type == 'pages')
                        @include('portal.lookups.pages')
                    @else

                    <div class="row mt-5">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body text-center">
                                    <p class="mb-4 h3">Our Lookups Data</p>
                                    <p class="fs-30 mb-2"><a class="btn btn-primary" href="{{ route('lookups.index', ['type' => 'info']) }}">Update Data</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body text-center">
                                    <p class="mb-4 h3">Site Pages Lookups</p>
                                    <p class="fs-30 mb-2"><a class="btn btn-primary" href="{{ route('lookups.index', ['type' => 'pages']) }}">Update Data</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
