@extends('portal.layouts.temp')
@section('li_testimonials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show Testimonial Data</h4>
                        <a href="{{ route('testimonials.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $testimonial->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $testimonial->name }}</td>
                                </tr>
                                <tr>
                                    <th>Job</th>
                                    <td>{{ $testimonial->job }}</td>
                                </tr>
                                <tr>
                                    <th>Stars</th>
                                    <td>{{ $testimonial->stars }}</td>
                                </tr>
                                <tr>
                                    <th>Body</th>
                                    <td style="white-space: normal">{!! $testimonial->body !!}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($testimonial->status)
                                        <span class="badge badge-success">Visible</span>
                                        @else
                                        <span class="badge badge-danger">Invisible</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $testimonial->created_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
