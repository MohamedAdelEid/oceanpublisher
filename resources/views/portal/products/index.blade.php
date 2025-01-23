@extends('portal.layouts.temp')
@section('li_products', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of Products</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-dark btn-rounded">
                            <i class="icon-plus btn-icon-prepend"></i> Create New
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Component</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->category->name }}</td>
                                            <td>
                                                @if ($row->status)
                                                    <span class="badge badge-success">Visible</span>
                                                @else
                                                    <span class="badge badge-danger">Invisible</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ $row->image }}" target="_blank" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="view Image">
                                                    <i class="icon-image"></i>
                                                </a>
                                                <a href="{{ $row->demo }}" target="_blank" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="view Demo">
                                                    <i class="icon-book"></i>
                                                </a>
                                                <a href="{{ $row->source }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="view Source">
                                                    <i class="icon-archive"></i>
                                                </a>
                                                <a href="{{ $row->teacher_resources }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="view Teacher Resources">
                                                    <i class="icon-file"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('products.show', $row->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Show Row">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{ route('products.edit', $row->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update Row">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:;" data-href="{{ route('products.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
                                                        <i class="ti-close"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
