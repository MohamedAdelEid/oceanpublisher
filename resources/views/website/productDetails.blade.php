@extends('website.layouts.temp')
@section('title', $data['product']->title)
@section('li_categories', 'active')


@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>Products</li>
            </ol>
            <h2>{{ $data['product']->category->name }}</h2>
        </div>
    </section>
    <!-- ======= End Breadcrumbs ======= -->

    <!-- ======= Product Section ======= -->
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h1 class="display-2"><strong>{{ $data['product']->title }}</strong></h1>
                <h2>{{ $data['product']->author }}</h2>
            </header>

            <div class="row">
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="{{ $data['product']->image }}" class="img-fluid" alt="{{ $data['product']->title }}">
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ $data['product']->demo }}" target="_blank" class="btn btn-warning text-white">
                            <i class="bi bi-binoculars-fill"></i> Look Inside
                        </a>
                        <button id="getTheBook" data-id="{{ $data['product']->id }}" class="btn btn-warning text-white mx-2">
                            <i class="bi bi-cloud-arrow-down-fill"></i> Download Multimedia
                        </button>
                        @auth
                        <a href="{{ $data['product']->teacher_resources }}" class="btn btn-warning text-white">
                            <i class="bi bi-person-lines-fill"></i> Download Teacher Resources
                        </a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="fs-4">{{ $data['product']->intro }}</div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-12">
                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#description">Description</a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#details">Book Details</a>
                        </li>
                    </ul>
                    <!-- End Tabs -->
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description">
                            <div class="mt-5">{!! $data['product']->description !!}</div>
                        </div>
                        <div class="tab-pane fade" id="details">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach ($data['product']->details as $item)
                                        <tr style="height: 80px" class="align-middle">
                                            <th scope="row">{{ $item->name }}</th>
                                            <td>{{ $item->value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
            </div>
            <!-- End Tabs -->


        </div>

    </section>
    <!-- ======= End Product ======= -->
    
@endsection
