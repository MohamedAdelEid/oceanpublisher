@extends('portal.layouts.temp')
@section('li_products', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show Product Data</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <th>Intro</th>
                                    <td style="white-space: normal">{{ $product->intro }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td style="white-space: normal">{!! $product->description !!}</td>
                                </tr>
                                <tr>
                                    <th>Details</th>
                                    <td>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product->details as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->value }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Author</th>
                                    <td>{{ $product->author }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><a href="{{ $product->image }}" target="_blank">View Image</a></td>
                                </tr>
                                <tr>
                                    <th>Demo</th>
                                    <td><a href="{{ $product->demo }}" target="_blank">View Demo</a></td>
                                </tr>
                                <tr>
                                    <th>Source</th>
                                    <td><a href="{{ $product->source }}">View Source</a></td>
                                </tr>
                                <tr>
                                    <th>Teacher Resources</th>
                                    <td><a href="{{ $product->teacher_resources }}">View Resources</a></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($product->status)
                                        <span class="badge badge-success">Visible</span>
                                        @else
                                        <span class="badge badge-danger">Invisible</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $product->created_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
