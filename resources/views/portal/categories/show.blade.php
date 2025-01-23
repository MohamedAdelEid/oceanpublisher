@extends('portal.layouts.temp')
@section('li_categories', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show Category Data</h4>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>Parent</th>
                                    <td>{{ $category->parent->name ?? '-' }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Description</th>
                                    <td style="white-space: normal">{{ $category->description }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><a href="{{ $category->image }}" target="_blank">View Image</a></td>
                                </tr>
                                <tr>
                                    <th>Show Menu</th>
                                    <td>
                                        @if ($category->show_menu)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($category->status)
                                        <span class="badge badge-success">Visible</span>
                                        @else
                                        <span class="badge badge-danger">Invisible</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $category->created_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
