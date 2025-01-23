@extends('portal.layouts.temp')
@section('li_serials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of serials</h4>
                        <a href="{{ route('serials.create') }}" class="btn btn-dark btn-rounded">
                            <i class="icon-plus btn-icon-prepend"></i> Create New
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if (request()->product)
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table-export" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Number</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Capacity</th>
                                            <th>Is Valid</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->product->title }}</td>
                                            <td>{{ $row->number }}</td>
                                            <td>{{ $row->startdate }}</td>
                                            <td>{{ $row->enddate }}</td>
                                            <td>{{ $row->capacity  }}</td>
                                            <td>
                                                @if ($row->is_valid)
                                                    <span class="badge badge-success">Yes</span>
                                                @else
                                                    <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->updated_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('serials.edit', $row->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update Row">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:;" data-href="{{ route('serials.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
                                                        <i class="ti-close"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Count</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->product->title }}</td>
                                            <td>{{ $row->product->serials->count() }}</td>
                                            <td>{{ $row->startdate }}</td>
                                            <td>{{ $row->enddate }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('serials.index', ['product='.$row->product_id]) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Show Row">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('serials.edit-group', $row->product_id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit Product Serials">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
